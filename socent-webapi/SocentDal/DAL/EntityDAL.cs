using Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocentDAL
{
    public class EntityDAL<T> where T : EntityBase
    {
        public T Create(T entity)
        {
            using (var context = new SocentContext())
            {
                context.Set<T>().Add(entity);
                context.SaveChanges();
                return entity;
            }
        }

        public void Delete(T entity)
        {
            using (var context = new SocentContext())
            {
                context.Set<T>().Remove(entity);
                context.SaveChanges();
            }
        }
    }
}

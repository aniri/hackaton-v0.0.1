using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocentBL.Interfaces
{
    public interface IBaseService<T>
    {
        T GetById(int id);
        T Create(T entity);
        T Update(T entity);
        void Delete(T entity);
    }
}

using SocentBL.Interfaces;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Model.Entities;
using SocentDAL;

namespace SocentBL.Services
{
    public class LegalEntityService : ILegalEntityService
    {
        LegalEntityDAL lentDal;

        public LegalEntityService()
        {
            lentDal = new LegalEntityDAL();
        } 

        public LegalEntity Create(LegalEntity entity)
        {
            return lentDal.Create(entity);
        }

        public void Delete(LegalEntity entity)
        {
            lentDal.Delete(entity);
        }

        public LegalEntity GetById(int id)
        {
            return lentDal.GetById(id);
        }

        public LegalEntity Update(LegalEntity entity)
        {
            return lentDal.Update(entity);
        }
    }
}

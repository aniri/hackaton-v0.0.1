using Model.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocentDAL
{
    public class LegalEntityDAL : EntityDAL<LegalEntity>
    {

        public LegalEntity GetById(int id)
        {
            using (var context = new SocentContext())
            {
                var existEntity = context.LegalEntities
                    .Include("TerritorialOffice")
                    .Include("ActivityDomain")
                    .Include("SocialInterventionDomains")
                    .Include("SocialEnterpriseType")
                    .Single(e => e.Id == id);
                return existEntity;
            }
        }
        public LegalEntity Update(LegalEntity entity)
        {
            using (var context = new SocentContext())
            {
                var existEntity = context.LegalEntities.Single(e => e.Id == entity.Id);

                existEntity.AdministratorName = entity.AdministratorName;
                existEntity.ContactPersonName = entity.ContactPersonName;
                existEntity.CUI = entity.CUI;
                existEntity.ActivationDate = entity.ActivationDate;
                existEntity.ActivityDomain = entity.ActivityDomain;
                existEntity.LegalEntityName = entity.LegalEntityName;
                existEntity.SocialEnterpriseType = entity.SocialEnterpriseType;
                existEntity.SocialInterventionDomains = entity.SocialInterventionDomains;
                existEntity.TerritorialOffice = entity.TerritorialOffice;

                context.SaveChanges();
                return existEntity;
            }
        }
    }
}

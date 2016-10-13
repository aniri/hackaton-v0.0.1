using Model.Classifications;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Model.Entities
{
    //Persoana juridica drept privat
    public class LegalEntity : EntityBase
    {
        public TerritorialOffice TerritorialOffice { get; set; }
        public string LegalEntityName { get; set; }
        public string CUI { get; set; }
        public DateTime ActivationDate { get; set; }
        public ActivityDomain ActivityDomain { get; set; }
        public List<SocialInterventionDomain> SocialInterventionDomains { get; set; }
        public SocialEnterpriseType SocialEnterpriseType { get; set; }
        public string AdministratorName { get; set; }
        public string ContactPersonName { get; set; }
    }
}

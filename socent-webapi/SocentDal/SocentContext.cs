using Model.Classifications;
using Model.Entities;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Data.Entity.ModelConfiguration.Conventions;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocentDAL
{
    [DbConfigurationType(typeof(MySql.Data.Entity.MySqlEFConfiguration))]
    public class SocentContext : DbContext
    {
        public DbSet<County> Countys { get; set; }
        public DbSet<SocialEnterpriseType> SocialEnterpriseTypes { get; set; }
        public DbSet<SocialInterventionDomain> SocialInterventionDomains { get; set; }

        public DbSet<ActivityDomain> ActivityDomains { get; set; }
        public DbSet<Address> Addresses { get; set; }
        public DbSet<EntityAddress> EntityAddresses { get; set; }
        public DbSet<LegalEntity> LegalEntities { get; set; }
        public DbSet<TerritorialOffice> TerritorialOffices { get; set; }

        public SocentContext():base("EntityContext")
        {
            Database.SetInitializer<SocentContext>(new SocentDbIntializer());
        }

        protected override void OnModelCreating(DbModelBuilder modelBuilder)
        {
            modelBuilder.Conventions.Remove<PluralizingTableNameConvention>();
        }
    } 
}

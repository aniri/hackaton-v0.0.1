namespace SocentDal.Migrations
{
    using Model.Classifications;
    using Model.Entities;
    using System;
    using System.Collections.Generic;
    using System.Data.Entity;
    using System.Data.Entity.Migrations;
    using System.Linq;

    internal sealed class Configuration : DbMigrationsConfiguration<SocentDAL.SocentContext>
    {
        public Configuration()
        {
            AutomaticMigrationsEnabled = true;
        }

        protected override void Seed(SocentDAL.SocentContext context)
        {
            var countys = new List<County>
            {
                new County{Name="AB",Description="Alba"},
                new County{Name="AR",Description="Arad"},
                new County{Name="AG",Description="Argeș"},
                new County{Name="BC",Description="Bacău"},
                new County{Name="BH",Description="Bihor"},
                new County{Name="BN",Description="Bistrița-Năsăud"},
                new County{Name="BT",Description="Botoșani"},
                new County{Name="BV",Description="Brașov"},
                new County{Name="BR",Description="Brăila"},
                new County{Name="Sector1",Description="Bucuresti"},
                new County{Name="Sector2",Description="Bucuresti"},
                new County{Name="Sector3",Description="Bucuresti"},
                new County{Name="Sector4",Description="Bucuresti"},
                new County{Name="Sector5",Description="Bucuresti"},
                new County{Name="Sector6",Description="Bucuresti"},
                new County{Name="BZ",Description="Buzău"},
                new County{Name="CS",Description="Caraș-Severin"},
                new County{Name="CL",Description="Călărași"},
                new County{Name="CJ",Description="Cluj"},
                new County{Name="CT",Description="Constanța"},
                new County{Name="CV",Description="Covasna"},
                new County{Name="DB",Description="Dâmbovița"},
                new County{Name="DJ",Description="Dolj"},
                new County{Name="GL",Description="Galați"},
                new County{Name="GR",Description="Giurgiu"},
                new County{Name="GJ",Description="Gorj"},
                new County{Name="HR",Description="Harghita"},
                new County{Name="HD",Description="Hunedoara"},
                new County{Name="IL",Description="Ialomița"},
                new County{Name="IS",Description="Iași"},
                new County{Name="IF",Description="Ilfov"},
                new County{Name="MM",Description="Maramureș"},
                new County{Name="MH",Description="Mehedinți"},
                new County{Name="MS",Description="Mureș"},
                new County{Name="NT",Description="Neamț"},
                new County{Name="OT",Description="Olt"},
                new County{Name="PH",Description="Prahova"},
                new County{Name="SM",Description="Satu Mare"},
                new County{Name="SJ",Description="Sălaj"},
                new County{Name="SB",Description="Sibiu"},
                new County{Name="SV",Description="Suceava"},
                new County{Name="TR",Description="Teleorman"},
                new County{Name="TM",Description="Timiș"},
                new County{Name="TL",Description="Tulcea"},
                new County{Name="VS",Description="Vaslui"},
                new County{Name="VL",Description="Vâlcea"},
                new County{Name="VN",Description="Vrancea"}
            };

            context.Countys.AddRange(countys);

            context.SocialEnterpriseTypes.Add(
                new SocialEnterpriseType
                {
                    Name = "Asociatii",
                    Description = ""
                });

            var socIntDomains = new List<SocialInterventionDomain>
            {
                new SocialInterventionDomain { Name = "Educatie alternativa", Description = "" }
            };

            context.SocialInterventionDomains.AddRange(socIntDomains);

            var caens = new List<ActivityDomain>
            {
                new ActivityDomain { CAENCode = "1111", Description = "Cultivarea cerealelor (exclusiv orez), plantelor leguminoase si a plantelor producatoare de seminte oleaginoase", Date = DateTime.Now }
            };
            context.ActivityDomains.AddRange(caens);

            var addresses = new List<Address>
            {
                new Address { County = countys[0], Phone = "0123456789", StreetName = "Liberatii", StreetNo = "16A", Date = DateTime.Now }
            };
            context.Addresses.AddRange(addresses);

            var entAddresses = new List<EntityAddress>
            {
                new EntityAddress { County = countys[1], Phone = "0123456789", StreetName = "Egalitatii", StreetNo = "12C", Email = "", Fax = "", Website = "www.socent.ro", Date = DateTime.Now }
            };
            context.EntityAddresses.AddRange(entAddresses);

            var territOffices = new List<TerritorialOffice>
            {
                new TerritorialOffice { County = countys[0], Date = DateTime.Now }
            };
            context.TerritorialOffices.AddRange(territOffices);

            context.SaveChanges();
            base.Seed(context);
        }
    }
}

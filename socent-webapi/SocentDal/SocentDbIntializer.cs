using Model.Classifications;
using Model.Entities;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SocentDAL
{
    public class SocentDbIntializer : CreateDatabaseIfNotExists<SocentContext>
    {
        protected override void Seed(SocentContext context)
        {
            base.Seed(context);
        }
    }
}

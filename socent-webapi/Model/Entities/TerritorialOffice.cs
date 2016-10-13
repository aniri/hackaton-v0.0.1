using Model.Classifications;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Model.Entities
{
    public class TerritorialOffice : EntityBase
    {
        public County County { get; set; }
    }
}

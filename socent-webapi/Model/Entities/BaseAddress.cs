using Model.Classifications;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Model.Entities
{
    public abstract class BaseAddress : EntityBase
    {
        public County County { get; set; }
        public string StreetName { get; set; }
        public string StreetNo { get; set; }
        public string Phone { get; set; }
    }
}

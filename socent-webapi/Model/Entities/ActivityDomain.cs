using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Model.Entities
{
    //domeniu activitate - cod caen
    public class ActivityDomain:EntityBase
    {
        public string CAENCode { get; set; }
        public string Description { get; set; }
    }
}

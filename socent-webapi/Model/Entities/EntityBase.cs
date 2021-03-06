﻿using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Model.Entities
{
    public abstract class EntityBase
    {
        [Key]
        public int Id { get; set; }
        [Required]
        public DateTime Date { get; set; }
    }
}

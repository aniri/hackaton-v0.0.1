using Model.Entities;
using Newtonsoft.Json;
using SocentBL.Interfaces;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;

namespace SocentWebApi.Controllers
{
    [RoutePrefix("legalentity")]
    public class LegalEntityController : ApiController
    {
        private ILegalEntityService _leService;

        public LegalEntityController(ILegalEntityService leService)
        {
            _leService = leService;
        }

        [HttpGet]
        [Route("get")]
        public LegalEntity Get([FromUri]int lentId)
        {
            var lent = _leService.GetById(lentId);

            return lent;
        }

        [HttpPost]
        [Route("create")]
        public LegalEntity Create([FromBody]LegalEntity legalEntity)
        {
            //var le = JsonConvert.DeserializeObject<LegalEntity>(legalEntity);

            var createdLe = _leService.Create(legalEntity);

            return createdLe;
            //return JsonConvert.SerializeObject(createdLe);
        }

        [HttpPost]
        [Route("update")]
        public string Update([FromBody]string legalEntity)
        {
            var le = JsonConvert.DeserializeObject<LegalEntity>(legalEntity);

            var createdLe = _leService.Update(le);

            return JsonConvert.SerializeObject(createdLe);
        }

        [HttpPost]
        [Route("delete")]
        public void Delete([FromBody]string legalEntity)
        {
            var le = JsonConvert.DeserializeObject<LegalEntity>(legalEntity);

            _leService.Delete(le);
        }
    }
}

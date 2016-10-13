using Microsoft.Practices.Unity.InterceptionExtension;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace SocentWebApi.App_Start
{
    public class LoggingInterceptionBehavior : IInterceptionBehavior
    {

        private static readonly log4net.ILog log = log4net.LogManager.GetLogger(System.Reflection.MethodBase.GetCurrentMethod().DeclaringType);
        public IMethodReturn Invoke(IMethodInvocation input, GetNextInterceptionBehaviorDelegate getNext)
        {
            // Before invoking the method on the original target.
            log.InfoFormat("Invoking method {0}", input.MethodBase);

            // Invoke the next behavior in the chain.
            var result = getNext()(input, getNext);

            // After invoking the method on the original target.
            if (result.Exception != null)
            {
                log.ErrorFormat(" {0} - {1}", input.MethodBase, result.Exception.Message);
            }
            else
            {
                log.InfoFormat(" {0} - {1}", input.MethodBase, result.ReturnValue);
            }

            return result;
        }

        public IEnumerable<Type> GetRequiredInterfaces()
        {
            return Type.EmptyTypes;
        }

        public bool WillExecute
        {
            get { return true; }
        }
    }
}
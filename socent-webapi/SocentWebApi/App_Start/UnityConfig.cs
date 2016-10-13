using Microsoft.Practices.Unity;
using Microsoft.Practices.Unity.InterceptionExtension;
using SocentBL.Interfaces;
using SocentBL.Services;
using SocentWebApi.App_Start;
using System.Web.Http;
using Unity.WebApi;

namespace SocentWebApi
{
    public static class UnityConfig
    {
        public static void RegisterComponents()
        {
			var container = new UnityContainer();
            container.AddNewExtension<Interception>();

            container.RegisterType<ILegalEntityService, LegalEntityService>(
                new Interceptor<InterfaceInterceptor>(),
                new InterceptionBehavior<LoggingInterceptionBehavior>());

            GlobalConfiguration.Configuration.DependencyResolver = new UnityDependencyResolver(container);
        }
    }
}
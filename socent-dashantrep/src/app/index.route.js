(function() {
  'use strict';

  angular
    .module('inspinia')
    .config(routerConfig);

  /** @ngInject */
  function routerConfig($stateProvider, $urlRouterProvider) {
    $stateProvider

      .state('index', {
        abstract: true,
        url: "/index",
        templateUrl: "app/components/common/content.html"
      })
      .state('index.dashboard', {
        url: "/dashboard",
        templateUrl: "app/dashboard/dashboard.html",
        data: { pageTitle: 'Panou de control' }
      })
      .state('index.register', {
        url: "/register",
        templateUrl: "app/register/register.html",
        data: { pageTitle: 'Inregistreaza o intreprindere' }
      });

    $urlRouterProvider.otherwise('/index/dashboard');
  }

})();

/// <reference path="restricted/restrictedController.js" />
(function (app) {

    'use strict';

    app.config(['$injector', '$stateProvider', '$urlRouterProvider', 
        function ($injector, $stateProvider, $urlRouterProvider) {

            // Redirect to home on invalid route
            $urlRouterProvider.otherwise(function ($injector) {
                // Workaround for https://github.com/angular-ui/ui-router/issues/600
                var $state = $injector.get('$state');
                $state.go('home');
            });

            $stateProvider
                .state('home', {
                    url: '/',
                    templateUrl: 'app/controllers/home/home.html',
                    controller: 'homeController'
                })

                .state('scan', {
                    url: '/',
                    templateUrl: 'app/controllers/scan/scan.html',
                    controller: 'scanController'
                })

                .state('code', {
                    url: '/',
                    templateUrl: 'app/controllers/code/code.html',
                    controller: 'codeController'
                })
            ;
                
        }]);

    app.run(['$log', '$rootScope', '$state', '_', 'deviceService',
        function ($log, $rootScope, $state, _, deviceService) {

            // Handle user authorization on route change events
            $rootScope.$on('$stateChangeStart', function (event, toState, toParams, fromState, fromParams) {

                var logger = $log.getLogger('$stateChangeStart');

                
            });

        }]);

})(window.govAuthenticator.app);
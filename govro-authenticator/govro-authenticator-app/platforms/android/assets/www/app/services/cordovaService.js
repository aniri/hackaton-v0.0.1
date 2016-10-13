(function (app) {

    'use strict';

    var serviceName = 'cordovaService';

    app.factory(serviceName, ['$log', '$rootScope', '$window',
        function ($log, $rootScope, $window) {

            var service = {};

            var init = function () {

                logger.info('Service started.');

                document.addEventListener('pause', broadcastPause, false);
                document.addEventListener('resume', broadcastResume, false);
                document.addEventListener('backbutton', broadcastBackButton, false);
                document.addEventListener('batterycritical', broadcastBatteryCritical, false);
            };

            // Private members
            {
                var logger = $log.getLogger(serviceName);

                var document = $window.document;

                var navigator = $window.navigator;

                var cordova = $window.cordova;

                // Broadcast cordova pause app event
                var broadcastPause = function (cordovaEvent) {
                    logger.info('Broadcast application pause.');
                    $rootScope.$broadcast(serviceName + ':pause', cordovaEvent);
                };

                // Broadcast cordova resume app event
                var broadcastResume = function (cordovaEvent) {
                    logger.info('Broadcast application resume.');
                    $rootScope.$broadcast(serviceName + ':resume', cordovaEvent);
                };

                // Broadcast cordova back button click
                var broadcastBackButton = function (cordovaEvent) {
                    logger.info('Broadcast back button click.');
                    $rootScope.$broadcast(serviceName + ':backButton', cordovaEvent);
                };

                // Broadcast cordova battery critical event
                var broadcastBatteryCritical = function (cordovaEvent) {
                    logger.info('Broadcast battery critical event.');
                    $rootScope.$broadcast(serviceName + ':batteryCritical', cordovaEvent);
                };
            }

            // Public members
            {

            }

            init();

            return service;

        }]);


})(window.govAuthenticator.app);

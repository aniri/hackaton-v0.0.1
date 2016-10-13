(function (app) {

    'use strict';

    var controllerName = 'scanController';

    app.controller(controllerName, ['$log', '$scope',
        function ($log, $scope) {

            var logger = $log.getLogger(controllerName);

            var init = function () {
                logger.info('Loaded.');
            };

            init();

        }]);

})(window.govAuthenticator.app);

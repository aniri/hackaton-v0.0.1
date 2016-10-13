(function (app) {

    'use strict';

    var controllerName = 'homeController';

    app.controller(controllerName, ['$log', '$scope', 'barcodeScannerService', '$ionicPopup',
        function ($log, $scope, barcodeScannerService, $ionicPopup) {

            var logger = $log.getLogger(controllerName);

            var init = function () {
                logger.info('Loaded.');
            };

            init();

            $scope.scanBarcode = function () {

                logger.info('Attempting to scan barcode.');

                barcodeScannerService
                    .scanBarcode()
                    .then(function (result) {

                        logger.debug('Barcode scan completed.', result);

                        if (!result.cancelled) {

                            if (result.format != barcodeScannerService.barcodeFormats.QR_CODE) {
                                $ionicPopup.showAlert('QR Code error');
                            }
                            else {
                                $ionicPopup.showInfo(result.text);
                            }
                        }
                    })
                    .catch(function (error) {
                        logger.error('QR Code scan failed.', error);
                        $ionicPopup.showAlert('Scanarea a eșuat, vă rugăm reîncercați.');
                    });
            };

        }]);

})(window.govAuthenticator.app);

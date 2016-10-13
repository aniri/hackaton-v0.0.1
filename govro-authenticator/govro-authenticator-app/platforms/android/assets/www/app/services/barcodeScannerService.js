(function (app, barcodeScanner) {

    'use strict';

    var serviceName = 'barcodeScannerService';

    app.factory(serviceName, ['$log', '$q', '_',
        function ($log, $q, _) {

            var service = {};

            var init = function () { };

            // Private members
            {
                var logger = $log.getLogger(serviceName);

                var scanner = barcodeScanner;
            }

            // Public members
            {
                // Start-up camera and scan a barcode
                service.scanBarcode = function () {

                    logger.info('Barcode scan requested.');

                    var deferred = $q.defer();
                    var promise = deferred.promise;

                    barcodeScanner
                        .scan(function (result) {

                            //result = {
                            //    canceled: boolean, // wether scan was cancelled or not
                            //    text: string, // the scanned code
                            //    format: string // the format of the barcode (from barcodeScanner.format)
                            //}

                            if(!result.cancelled){
                                var supportedFormats = _.valuesIn(service.barcodeFormats);

                                if (supportedFormats.indexOf(result.format) < 0)
                                    logger.error('Barcode scanner returned unknown format.', result);
                            }
                            
                            logger.debug('Barcode scan completed.', result);
                            deferred.resolve(result);
                        },
                        function (error) {

                            logger.error('Error completing barcode scan.', error);
                            deferred.reject(error);
                        });

                    return promise;
                };

                // Enum of supported barcode format strings
                service.barcodeFormats = {
                    AZTEC: 'AZTEC',
                    CODABAR: 'CODABAR',
                    CODE_39: 'CODE_39',
                    CODE_93: 'CODE_93',
                    CODE_128: 'CODE_128',
                    DATA_MATRIX: 'DATA_MATRIX',
                    EAN_8: 'EAN_8',
                    EAN_13: 'EAN_13',
                    ITF: 'ITF',
                    MAXICODE: 'MAXICODE',
                    MSI: 'MSI',
                    PDF_417: 'PDF_417',
                    PLESSEY: 'PLESSEY',
                    QR_CODE: 'QR_CODE',
                    RSS_14: 'RSS_14',
                    RSS_EXPANDED: 'RSS_EXPANDED',
                    UPC_A: 'UPC_A',
                    UPC_E: 'UPC_E',
                    UPC_EAN_EXTENSION: 'UPC_EAN_EXTENSION'
                };
            }

            init();

            return service;

        }]);

})(window.govAuthenticator.app, window.cordova.plugins.barcodeScanner);

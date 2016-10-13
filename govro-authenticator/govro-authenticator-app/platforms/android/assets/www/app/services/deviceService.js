(function (app, dev) {

    'use strict';

    var serviceName = 'deviceService';

    app.factory(serviceName, ['$log',
        function ($log) {

            var service = {};

            // Private members
            {
                var logger = $log.getLogger(serviceName);

                var device = dev;
            }

            // Public members
            {
                // Get the device's serial number
                service.getSerial = function () {
                    return device.serial;
                };

                // Get the device's OS name
                service.getPlatform = function () {
                    return device.platform;
                };

                // Get the device's OS version
                service.getVersion = function() {
                    return device.version;
                };

                // Get the devie's manufacturer name (e.g. 'samsung')
                service.getManufacturer = function () {
                    return device.manufacturer;
                };

                // Get the device's model
                service.getModel = function () {
                    return device.model;
                };

                // Get the device/apps Unique Id
                service.getUUID = function () {
                    return device.uuid;
                };
            }

            return service;

        }]);

})(window.govAuthenticator.app, window.device);

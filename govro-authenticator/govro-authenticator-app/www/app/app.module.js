(function (window) {

    'use strict';

    var moduleName = 'govMobile';

    var app = window.angular.module(moduleName, [
        'ionic',
        'ngAnimate',
        'ngFileUpload',
        'ngMessages',
        'ui.router'
    ]);

    // Configuring the module's services (only providers can be injected)
    app.config(['$httpProvider', '$ionicLoadingProvider', '$provide', 
        function ($httpProvider, $ionicLoadingProvider, $provide) {

            // Helpers
            {
                // Helper that assigns source's properties to the target
                var assign = function (target, source) {

                    for (var propertyKey in source) {
                        if (source.hasOwnProperty(propertyKey)) {
                            target[propertyKey] = source[propertyKey];
                        }
                    }

                    return target;
                };
            }

            // Configuring logging service
            {
                // Decorate log to allow saving messages to console
                $provide.decorator('$log', ['$delegate', '_', 'CONFIG', 'LOG_OUTPUT_TYPES', function ($log, _, CONFIG, LOG_OUTPUT_TYPES) {

                    if (!_.some(CONFIG.logOutputTypes, _.partial(_.eq, LOG_OUTPUT_TYPES.console))) {
                        $log.debug = function () { };
                        $log.error = function () { };
                        $log.info = function () { };
                        $log.log = function () { };
                        $log.warn = function () { };
                    }

                    return $log;
                }]);

                // Decorate log to save messages to file system
                $provide.decorator('$log', ['$delegate', '_', 'CONFIG', 'LOG_OUTPUT_TYPES', function ($log, _, CONFIG, LOG_OUTPUT_TYPES) {

                        return $log
                }]);

                // Decorate log to allow saving certain message types
                $provide.decorator('$log', ['$delegate', '_', 'CONFIG', 'LOG_MESSAGE_TYPES', function ($log, _, CONFIG, LOG_MESSAGE_TYPES) {

                    if (!_.some(CONFIG.logMessageTypes, _.partial(_.eq, LOG_MESSAGE_TYPES.debug)))
                        $log.debug = function () { };

                    if (!_.some(CONFIG.logMessageTypes, _.partial(_.eq, LOG_MESSAGE_TYPES.error)))
                        $log.error = function () { };

                    if (!_.some(CONFIG.logMessageTypes, _.partial(_.eq, LOG_MESSAGE_TYPES.info)))
                        $log.info = function () { };

                    if (!_.some(CONFIG.logMessageTypes, _.partial(_.eq, LOG_MESSAGE_TYPES.log)))
                        $log.log = function () { };

                    if (!_.some(CONFIG.logMessageTypes, _.partial(_.eq, LOG_MESSAGE_TYPES.warn)))
                        $log.warn = function () { };

                    return $log;
                }]);

                // Decorate log to format logged messages
                $provide.decorator('$log', ['$delegate', '_', 'CONFIG', 'LOG_MESSAGE_TYPES', function ($log, _, CONFIG, LOG_MESSAGE_TYPES) {

                    // Don't decorate if there's no output or nothing to log
                    if (CONFIG.logMessageTypes.length == 0
                        || CONFIG.logOutputTypes.length == 0) {

                        $log.getLogger = function () {
                            return $log;
                        };

                        return $log;
                    }

                    var originalLog = {
                        log: $log.log,
                        info: $log.info,
                        warn: $log.warn,
                        debug: $log.debug,
                        error: $log.error
                    };

                    // Wrapper for original logger functions that applies a template
                    var prepareLogFn = function (logFn, logLevel, loggerName) {

                        var loggerName = !loggerName ? 'N/A' : loggerName.toString();

                        // Wrap the original function in order to apply a template
                        var formattedLogFn = function () {

                            var args = Array.prototype.slice.call(arguments);
                            var now = (new Date()).toString();

                            var template = now + ' - ' + logLevel + ' - ' + loggerName + ' - ';

                            // Apply template to first argument if it's a string
                            if (typeof (args[0]) === 'string')
                                args[0] = template + args[0];

                                // Otherwise, prepend the template as an argument to the call
                            else
                                args.unshift(template);

                            logFn.apply(null, args);
                        };

                        // Angular-mocks expects this
                        formattedLogFn.logs = [];

                        return formattedLogFn;
                    };

                    // Wrap the original log functions
                    $log.debug = prepareLogFn($log.debug, LOG_MESSAGE_TYPES.debug);
                    $log.error = prepareLogFn($log.error, LOG_MESSAGE_TYPES.error);
                    $log.info = prepareLogFn($log.info, LOG_MESSAGE_TYPES.info);
                    $log.log = prepareLogFn($log.log, LOG_MESSAGE_TYPES.log);
                    $log.warn = prepareLogFn($log.warn, LOG_MESSAGE_TYPES.warn);

                    // Retrieves an instance of the logger
                    $log.getLogger = function (loggerName) {
                        return {
                            debug: prepareLogFn(originalLog.debug, LOG_MESSAGE_TYPES.debug, loggerName),
                            error: prepareLogFn(originalLog.error, LOG_MESSAGE_TYPES.error, loggerName),
                            info: prepareLogFn(originalLog.info, LOG_MESSAGE_TYPES.info, loggerName),
                            log: prepareLogFn(originalLog.log, LOG_MESSAGE_TYPES.log, loggerName),
                            warn: prepareLogFn(originalLog.warn, LOG_MESSAGE_TYPES.warn, loggerName)
                        };
                    };

                    // Returned the decorated logger
                    return $log;
                }]);
            }

            // Configuring ionic popup service
            {
                $provide.decorator('$ionicPopup', ['$delegate', function ($ionicPopup) {

                    // Default settings
                    var defaultOptions = {
                        cssClass: 'lmsPopup'
                    };

                    // Add defaults to show popup
                    var _oldShow = $ionicPopup.show;
                    $ionicPopup.show = function (options) {
                        var opts = {};
                        opts = assign(opts, defaultOptions);
                        opts = assign(opts, options);
                        return _oldShow(opts);
                    };

                    // Add defaults to alert
                    var _oldAlert = $ionicPopup.alert;
                    $ionicPopup.alert = function (options) {
                        var opts = {};
                        opts = assign(opts, defaultOptions);
                        opts = assign(opts, options);
                        return _oldAlert(opts);
                    };

                    // Show an information alert
                    $ionicPopup.showAlert = function (message) {

                        return $ionicPopup.show({
                            title: 'Atenție!',
                            template: message,
                            buttons: [{
                                text: '<b>OK</b>',
                                type: 'button-assertive',
                            }]
                        });
                    };

                    return $ionicPopup;
                }]);
            }

            // Configuring ionic loading service
            {
                $provide.decorator('$ionicLoading', ['$delegate', '$rootScope',
                    function ($ionicLoading, $rootScope) {

                        // Show function with custom defaults
                        var _oldShow = $ionicLoading.show;
                        $ionicLoading.show = function (options) {

                            if (!options)
                                options = {};

                            var opts = {};
                            opts = assign(opts, defaults);
                            opts = assign(opts, options);

                            // Allow null values for duration to pass
                            if (options.duration == null)
                                opts.duration == null;

                            return _oldShow(opts);
                        };

                        // Show function that displays a progress bar based on an object
                        $ionicLoading.showProgress = function (progress) {
                            //progress: {
                            //    max: max value of the progress bar
                            //    value: current value of the progress bar
                            //    text: text to display
                            //}

                            var scope = $rootScope.$new();
                            scope.progress = progress;

                            var options = {
                                template: '<div><progress max="{{progress.max}}" value="{{progress.value}}"></progress><div>{{progress.text}}</div></div>',
                                scope: scope
                            };

                            return _oldShow(options);
                        };

                        // Redefine defaults 
                        var defaults = {
                            delay: 250,
                            // Default duration of 50 seconds - to avoid completely blocking the screen on fatal errors
                            duration: 50000,
                            template: '<ion-spinner icon="bubbles" class="spinner-assertive"></ion-spinner>',
                            animation: 'fade-in',
                            noBackdrop: false,
                            maxWidth: 200
                        };

                        return $ionicLoading;
                    }]);
            }

        }]);

    // Module spin-up - Start-up services
    app.run(['$log', 'cordovaService', 
        function ($log, cordovaService) {

            $log.info('App starting with following configuration.');

        }]);

    // Manually bootstrap the module
    window.document.addEventListener('deviceready', function () {
        console.info(new Date() + ' - Bootstraping angular module ' + moduleName + '. Good luck everyone!');

        window.angular.bootstrap(window.document, [moduleName]);

        window.setTimeout(function () {
            window.navigator.splashscreen.hide();
        }, 3000);
    });

    // Expose the module to the rest of the application
    if (window.govAuthenticator)
        window.govAuthenticator.app = app;
    else
        window.govAuthenticator = {
            app: app
        };

})(window);
(function (app) {

    'use strict';

    app.factory('_', function () {

        if (!window
            || !window._
            || !window._.assign)
            throw new TypeError('Lodash has not been found on the window object.')

        // Keep a reference to the lodash object for injecting later
        var service = _;

        // Remove lodash reference from the window object
        delete window._;

        return service;
    });

})(window.govAuthenticator.app);

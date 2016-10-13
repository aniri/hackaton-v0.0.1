(function (app, Object) {

    'use strict';

    app.constant('LOG_MESSAGE_TYPES', Object.freeze({
        debug: 'DEBUG',
        error: 'ERROR',
        info: 'INFO',
        log: 'LOG',
        warn: 'WARN'
    }));

})(window.govAuthenticator.app, window.Object);
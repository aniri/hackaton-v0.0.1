(function (app, Object) {

    app.constant('CONFIG', Object.freeze({
       
        defaultHttpTimeout: 15 * 1000,
        // Default number of retries for each request that fails because of bad network connection
        httpRetries: 3,
        // The size IN BYTES to allocate on the phone's file system
        fileSystemSize: 100 * 1024 * 1024,
        // Interval to check for new messages (in milliseconds)
        messageCheckInterval: 5 * 60 * 1000,
        // Number of messages to save in local storage before flushing to disk
        logBufferSize: 100,
        // Interval to check if buffer is full (in milliseconds)
        logBufferCheckingInterval: 10 * 1000,
        // Interval to try to upload log files (in milliseconds)
        logUploadInterval: 6 * 60 * 60 * 1000,
        // Message types to log
        logMessageTypes: ['INFO', 'ERROR', 'DEBUG', 'LOG', 'WARN'],
        // Outputs to log messages to
        logOutputTypes: ['console', 'file'],
        // Current version of app
        version: {
            major: 0,
            minor: 1,
            patch: 7
        }
    }));
})(window.govAuthenticator.app, window.Object);
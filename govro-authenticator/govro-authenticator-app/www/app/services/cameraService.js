(function (app, camera) {

    'use strict';

    var serviceName = 'cameraService';

    app.factory(serviceName, ['$document', '$log', '$q', 'Upload',
        function ($document, $log, $q, Upload) {

            var service = {};

            var init = function() {

                if(!camera)
                    throw new Error('Camera plugin not found.');
            };

            // Private members
            {
                var document = $document[0];

                var logger = $log.getLogger(serviceName);

                // Get image from the camera plugin
                var getPhoto = function (successFn, errorFn, options) {
                    camera.getPicture(successFn, errorFn, options);
                };

                // Check if object is an image
                var isImage = function (image) {
                    return (image.nodeType === 1 && image.tagName.toLowerCase() == 'img');
                };
            }

            // Public members
            {
                // Open the camera to take a pic - Returns a loaded Image object
                service.getPhotoImage = function () {
                    var deferer = $q.defer();
                    var promise = deferer.promise;

                    // If photo is received, transform it to image
                    var successFn = function (photoUri) {
                        var image = new Image();

                        // Resolve the promise
                        image.onload = function () {
                            deferer.resolve(image);
                        };

                        image.onerror = function (error) {
                            deferer.reject(error);
                        };

                        //image.src = 'data:image/jpeg;base64,' + photoUri;
                        image.src = photoUri;
                        image.name = photoUri.split('/')[photoUri.split('/').length - 1];
                    };

                    var errorFn = function (error) {
                        deferer.reject(error);
                    };

                    var options = {
                        //destinationType: camera.DestinationType.DATA_URL,
                        destinationType: camera.DestinationType.FILE_URI,
                        sourceType: camera.PictureSourceType.CAMERA,
                        mediaType: camera.MediaType.PICTURE,
                        encodingType: camera.EncodingType.JPEG,
                        correctOrientation: true
                    };

                    getPhoto(successFn, errorFn, options);

                    promise
                    .then(function (photoUri) {
                        logger.debug('Photo: ', photoUri);
                    })
                    .catch(function (error) {
                        logger.debug('Photo not received: ', error);
                    });

                    return promise;
                };

                // Open the phone's album and get a pic - Returns a loaded Image object
                service.getAlbumPhotoImage = function () {
                    var deferer = $q.defer();
                    var promise = deferer.promise;

                    // If photo is received, transform it to image
                    var successFn = function (photoUri) {
                        var image = new Image();

                        // Resolve the promise
                        image.onload = function () {
                            deferer.resolve(image);
                        };

                        image.onerror = function (error) {
                            deferer.reject(error);
                        };

                        image.src = photoUri;
                        image.name = photoUri.split('/')[photoUri.split('/').length - 1];
                    };

                    var errorFn = function (error) {
                        deferer.reject(error);
                    };

                    var options = {
                        destinationType: camera.DestinationType.FILE_URI,
                        sourceType: camera.PictureSourceType.PHOTOLIBRARY,
                        mediaType: camera.MediaType.PICTURE,
                    };

                    getPhoto(successFn, errorFn, options);

                    promise
                    .then(function (photoUri) {
                        logger.debug('Photo: ', photoUri);
                    })
                    .catch(function (error) {
                        logger.debug('Photo not received: ', error);
                    });

                    return promise;
                };

                // Convert Image object to a Blob object
                service.imageToBlob = function (image) {
                    if (!isImage(image))
                        throw new TypeError('Received object is not an Image object.');

                    var dataUrl = service.imageToDataUrl(image);

                    var imageBlob = Upload.dataUrltoBlob(dataUrl);
                    imageBlob.name = image.name;

                    return imageBlob;
                };

                // Convert Image object to JPEG Base64 data url ('data:image/jpeg;base64,xxx')
                service.imageToDataUrl = function (image) {
                    if (!isImage(image))
                        throw new TypeError('Received object is not an Image object.');

                    var canvas = document.createElement('canvas');
                    canvas.width = image.naturalWidth;
                    canvas.height = image.naturalHeight;

                    var canvasContext = canvas.getContext('2d');
                    canvasContext.drawImage(image, 0, 0);

                    var dataUrl = canvas.toDataURL('image/jpeg');

                    return dataUrl;
                };
            }

            init();

            return service;

        }]);

})(window.govAuthenticator.app, window.navigator.camera);

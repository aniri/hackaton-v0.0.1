angular.module('romanescU.services', [])
    .service('__mongo', ['$q', '$timeout', '$ionicLoading', '$http',
        function($q, $timeout, $ionicLoading, $http) {
            var url = "https://api.mlab.com/api/1/databases/romanescu/collections/";

            // -->Get: collection
            this.getCollection = function(collectionName) {
                return $http({
                        method: 'GET',
                        url: url + collectionName + '?apiKey=53I4oJ7nO1ETzVGNC2P29L3reNO4nRI6'
                    })
                    .then(function(data) {
                        return data.data;
                    })
            }
        }
    ])
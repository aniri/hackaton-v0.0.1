'use strict';
angular.module('inspinia').controller('MainController', ['$location', function($location) {
    var location = ($location.search()).obj,
        locationResponse = angular.fromJson(location);
    this.userName = (locationResponse == undefined ? "Gelu Constantinescu" : locationResponse.name);
}]);

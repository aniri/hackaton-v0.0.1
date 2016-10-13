var app = angular.module('app', ['ngRoute']);

app.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    $routeProvider
      .when('/acasa', {
        templateUrl: 'assets/views/acasa.html',
        controller: 'HomeController'
      })
      .when('/echipa', {
        templateUrl: 'assets/views/echipa.html',
        controller: 'TeamController'
      })
      .when('/rezultat', {
        templateUrl: 'assets/views/rezultat.html',
        controller: 'VerifyController'
      })
      .when('/despre', {
        templateUrl: 'assets/views/despre.html',
        controller: 'AboutController'
      })
      .when('/istoric', {
        templateUrl: 'assets/views/istoric.html',
        controller: 'HistoryController'
      })
      .otherwise({
        redirect: '/acasa'
      });

    $locationProvider.html5Mode(true);
}])

app.controller('MainController', function MainController($scope, $rootScope, $http, $location, $routeParams) {
  if ($location.path() == '/') {
    $location.path('/acasa')
  }

  try {
    json = JSON.parse(decodeURI(window.location.search.replace("?status=Ok&obj=", "")).replace(new RegExp('\%2F', 'g'), '/'))
    $http.post('/sso.json', { email: json.email }).then(function successCallback(response) {
      $scope.basicLogin(response.data.id);
    })
  } catch (err) {
    console.log(err);
  }

  $scope.isLoggedIn = function () {
    var userId = localStorage.getItem('userId');
    $rootScope.loggedIn = userId != undefined;
    return $rootScope.loggedIn;
  }
  $scope.isLoggedIn();

  $scope.logout = function () {
    localStorage.clear();
    $scope.isLoggedIn();
    window.location.reload();
  };

  $scope.register = function () {
    // password_confirmation should be removed
    $http.post('/user.json', $scope.user).then(function successCallback(response) {
      userId = response.data.id;
      localStorage.setItem('userId', userId);
      $scope.isLoggedIn();
      $('#dismiss-register-form').click();
    }, function errorCallback(response) {
      console.log(response);
    });
  };

  $scope.basicLogin = function (userId) {
    localStorage.setItem('userId', userId);
    $scope.isLoggedIn();
    window.location.reload();
  }

  $scope.login = function () {
    $http.get('/user.json?email=' + $scope.user.email + '&password=' + $scope.user.password).then(function successCallback(response) {
      userId = response.data.id;
      $scope.basicLogin(userId);
      $('#dismiss-login-form').click();
    }, function errorCallback(response) {
      console.log(response);
    })
  };
});

app.controller('TeamController', function TeamController($scope) {});
app.controller('AboutController', function AboutController($scope) {});

app.controller('HistoryController', function HistoryController($scope, $http) {
  $scope.userId = localStorage.getItem('userId');
  $scope.items = [];

  $http.get('/history.json?user_id=' + $scope.userId).then(function successCallback(response) {
    $scope.items = response.data;
  }, function errorCallback(response) {
    console.log(response);
  });
});

app.controller('VerifyController', function VerifyController($scope, $http, $routeParams) {
  $scope.serie = localStorage.getItem('serie');
  $scope.userId = localStorage.getItem('userId');
  $scope.blur = $scope.userId == null;

  $scope.verify = function (serie) {
    $http.get('/check.json?serie=' + serie + '&user_id=' + $scope.userId).then(function successCallback(response) {
      if (response.data.length != 0)
        $scope.verifyDone = true;

      $scope.data = response.data;
      $scope.info = $scope.data.filter(function (value) {
        return value.data_type == "info";
      })[0];
      $scope.service = $scope.data.filter(function (value) {
        return value.data_type == 'service';
      })[0];
      $scope.daune = $scope.service.daune;
      $scope.reparatii = $scope.service.reparatii;
      $scope.itp = $scope.data.filter(function (value) {
        return value.data_type == 'itp';
      })[0];
    }, function errorCallback(response) {
      console.log(response);
    })
  };

  $scope.verify($scope.serie);

  $scope.getKeys = function (obj) {
    return Object.keys(obj);
  }
});

app.controller('HomeController', function HomeController($scope, $http, $location) {
  $scope.user = {};
  $scope.startVerify = function (serie) {
    localStorage.setItem('serie', serie);
    $location.path('/rezultat');
  };
});

$(document).ready(function() {
  $('ul.nav li.dropdown').hover(function() {
      $('.dropdown-menu', this).stop(true, true).slideDown(300);
    }, function() {
      $('.dropdown-menu', this).stop(true, true).slideUp(300);
    });
});

var rootPath = 'office/templates/';

angular.module('app', ['ngRoute'])
    .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider.
            when('/', {
                templateUrl: rootPath + 'main.html'
                // ,controller: 'mainCtrl'
            }).
            when('/comprar', {
                templateUrl: rootPath + 'main.html'
            }).
            when('/historial', {
                templateUrl: rootPath + 'main.html'
            }).
            when('/cuenta', {
                templateUrl: rootPath + 'main.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
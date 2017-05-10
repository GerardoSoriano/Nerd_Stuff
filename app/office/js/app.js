angular.module('app', ['ngRoute'])
    .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        var rootPath = 'office/routes/';
        $locationProvider.hashPrefix('');
        $routeProvider.
            when('/', {
                templateUrl: rootPath + 'main.html'
            }).
            when('/carrito', {
                templateUrl: rootPath + 'carrito.html'
            }).
            when('/comprar', {
                templateUrl: rootPath + 'comprar.html'
            }).
            when('/cuenta', {
                templateUrl: rootPath + 'cuenta.html'
            }).
            when('/historial', {
                templateUrl: rootPath + 'historial.html'
            }).
            when('/invitados', {
                templateUrl: rootPath + 'invitados.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
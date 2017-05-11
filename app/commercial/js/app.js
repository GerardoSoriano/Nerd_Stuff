$(document).ready(function () {
    $('.carousel').carousel({
        interval: 5000
    })
});

var rootPath = 'commercial/templates/';

angular.module('app', ['ngRoute'])
    .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider.
            when('/', {
                templateUrl: rootPath + 'main.html'
            }).
            when('/about', {
                templateUrl: rootPath + 'about.html'
            }).
            when('/contact', {
                templateUrl: rootPath + 'contact.html'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);

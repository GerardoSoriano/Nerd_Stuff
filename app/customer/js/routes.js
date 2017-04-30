var customerApp = angular.module('app', ['ngRoute']);
customerApp.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
    $locationProvider.hashPrefix('');
    $routeProvider.
    when('/',{
        templateUrl: 'templates/main.html',
        controller: "mainCtrl"
    }).
    when('/about',{
        templateUrl: 'templates/about.html'
    }).
    when('/blog',{
        templateUrl: 'templates/blog.html'
    }).
    when('/contact',{
        templateUrl: 'templates/contact.html'
    }).
    otherwise({
        redirectTo: '/'             
    });
}]);

customerApp.controller('mainCtrl', ['$scope', function($scope) {
    $scope.heading = 'Add / Edit Customer';
}]);
var rootPath = 'office/templates/';

angular.module('app', ['ngRoute'])
    .config(['$routeProvider', '$locationProvider', function ($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');
        $routeProvider.
            when('/', {
                templateUrl: rootPath + 'main.html'
                // ,controller: 'mainCtrl'
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
    }])

    .controller('mainController', ['$scope', function ($scope) {
        
        if (localStorage.getItem("usuario") != null) {
            $scope.usuario = localStorage.usuario;
        } else {            
            // window.location.href = "login.html";
            console.log("No tiene un usuario");
        }

        $scope.test = "Testing";
    }])

    .controller('menuController', ['$scope', function ($scope) {
        $scope.menuOnClick = function ($event) {
            var element = $event.target;
            $("ul.sections li").each(function () {
                $(this).removeClass("current");
            })
            $(element).addClass("current");
        }
    }]);


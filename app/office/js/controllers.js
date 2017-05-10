angular.module('app')
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
            console.log($(element).parent().get(0));
            $("ul.sections a").each(function () {
                $(this).removeClass("current");
            })
            $(element).parent().addClass("current");
        }
    }])

    .controller('headerController', ['$scope', function ($scope) {
        $scope.headerOnClick = function ($event) {
            $('div[class^="menu"]').toggleClass('menu menu-min');
            $('div[class^="header"]').toggleClass('header header-max');
            $('div[class^="content"]').toggleClass('content content-max');
        }
    }])

    .controller("treeController", ['$scope', '$http', function ($scope, $http) {
        $scope.usuarios = "";
        $http.get("resources/test.json")
            .then(function (response) {
                console.log("Aqui entro una vez");
                $scope.usuarios = response.data;
            });
    }])

    .controller("comprasController", ['$scope', '$http', function ($scope, $http) {
        $scope.compras = "";

        $scope.activarSlick = function (selector) {
            $(selector).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1572,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 1254,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 936,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }

        $scope.$on('Last-Elem-Favoritos-Event', function (event) {
            $scope.activarSlick("#compras-favoritos");
        });

        $scope.$on('Last-Elem-Ultimas-Event', function (event) {
            $scope.activarSlick("#compras-ultimasCompras");
        });

        $http({
            url: '../server/php/controller/comprar.php',
            method: "POST",
            data: { 'token': localStorage.getItem("token") }
        }).then(function (response) {
            $scope.compras = response.data;
            console.log($scope.compras);
        });

        $scope.$watch("compras", function (value) {
            console.log("CAMBIO COMPRAS");
        });

    }]);

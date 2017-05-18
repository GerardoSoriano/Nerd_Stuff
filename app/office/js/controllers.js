angular.module('app')
    .controller('mainController', ['$scope', function ($scope) {

        if (localStorage.getItem("usuario") != null) {
            $scope.usuario = JSON.parse(localStorage.usuario);
            console.log($scope.usuario);
        } else {
            // window.location.href = "login.html";
            console.log("No tiene un usuario");
        }
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
            if (($('.profilePicture').hasClass('.-profScaleMin')) || ($('.profilePicture').hasClass('.-profScaleMax'))) {
                $('.profilePicture -profScaleMin').toggleClass('.profilePicture -profScaleMax');
            } else {
                $('.profilePicture').addClass('.-profScaleMin')
            }
            if ($('.menu').hasClass('-min')) {
                $('div[class^="menu"]').toggleClass('menu menu -min');

                $('.menu').animate({
                    width: '+=190px'
                }, 500, function () {
                    // Animation complete.

                });
                $('.header').animate({
                    'padding-left': 270
                }, 500);
                $('.content').animate({
                    'padding-left': 280
                }, 500);
            } else {
                $('.menu').animate({
                    width: '-=190px'
                }, 500, function () {
                    $('div[class^="menu"]').toggleClass('menu menu -min');

                });
                $('.header').animate({
                    'padding-left': 70
                }, 500);
                $('.content').animate({
                    'padding-left': 50
                }, 500);

            }

            $('div[class^="header"]').toggleClass('header header -Hmin');
            $('div[class~="content"]').toggleClass('content content -Cmin');
        }
    }])

    .controller("treeController", ['$scope', '$http', function ($scope, $http) {
        $scope.usuarios = "";

        $http({
            url: '../server/php/controller/otros/misInvitados.php',
            method: "POST",
            data: { 'token': localStorage.getItem("token") }
        }).then(function (response) {
            console.log("Aqui entro una vez");
            $scope.usuarios = response.data;
            console.log(response.data);
        });

        $scope.colapse = function ($event) {
            var element = $event.target;
            var test = $(element).closest(".person");
            console.log(element);
            console.log(test);
        }
    }])

    .controller("comprasController", ['$scope', '$http', function ($scope, $http) {
        $scope.compras = "";
        $scope.categories = "";

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

            $http({
                url: '../server/php/controller/productosPorCategoria.php',
                method: "POST",
                data: { 'token': localStorage.getItem("token") }
            }).then(function (response) {
                $scope.categories = response.data;
                console.log($scope.categories);
            });
        });

        $scope.$watch("compras", function (value) {
            console.log("CAMBIO COMPRAS");
        });

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

    }])

    .controller("cuentaController", ['$scope', '$http', 'Upload', function ($scope, $http, Upload) {

        $scope.usuario = JSON.parse(localStorage.usuario);

        $scope.uploadPic = function (file) {
            if (!file) return;

            file.upload = Upload.upload({
                url: '../server/php/controller/modificarPerfil.php',
                data: {
                    image: file,
                    nombre: $scope.usuario.primerNombre,
                    token: localStorage.token
                }
            }).then(function (resp) {
                // file is uploaded successfully
                console.log(resp.data);
            });
        };
    }]);

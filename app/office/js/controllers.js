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

    .controller("finalizarCompra", ['$scope', '$http', function ($scope, $http) {
        $scope.productos = [];
        $scope.puntos = "";
        $scope.iva = "";
        $scope.total = "";

        $scope.$watch('productos', function (newValue, oldValue) {
            console.log("update model");
        });

        $scope.init = function () {
            $scope.productos = JSON.parse(localStorage.compra);
            $scope.puntos = "340";
            $scope.iva = "$169";
            $scope.total = "$1227";

            console.log($scope.productos);
        };
    }])

    .controller("comprasController", ['$scope', '$http', function ($scope, $http) {
        $scope.compras = "";
        $scope.categories = "";
        $scope.firstSlick = true;
        $scope.productosCarrito = [];
        $scope.item = 1;

        var cartWrapper = $('.cd-cart-container');
        var cartBody = cartWrapper.find('.body')
        var cartList = cartBody.find('ul').eq(0);
        var cartTotal = cartWrapper.find('.checkout').find('span');
        var cartTrigger = cartWrapper.children('.cd-cart-trigger');
        var cartCount = cartTrigger.children('.count')
        var addToCartBtn = $('.cd-add-to-cart');
        var undo = cartWrapper.find('.undo');
        var undoTimeoutId;

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

        $scope.productoClick = function (elemento) {
            //Actualizamos el modelo
            $scope.productosCarrito.push(elemento);

            //Actualizamos el carrito
            addToCart(elemento);
        }

        $scope.cartTrigger = function () {
            toggleCart();
        }

        $scope.deleteClick = function (product) {
            var index = $scope.productosCarrito.indexOf(product);
            if (index > -1) {
                $scope.productosCarrito.splice(index, 1);
                removeProduct(product, index);
            }
        }

        $scope.cartListChange = function (product, item) {
            var index = $scope.productosCarrito.indexOf(product);
            if (index > -1) {
                $scope.productosCarrito[index].quantity = item;
                console.log($scope.productosCarrito);
                quickUpdateCart();
            }
        }

        $scope.categoriaClick = function ($event) {
            var element = $event.target;
            var categoryName = $(element).text();
            categoryName = categoryName.trim();

            $(".category").addClass('hide');
            $(".category#" + categoryName).removeClass('hide');
            $(".navBar li").removeClass("current");
            $(element).closest("li").addClass("current");
        };

        $scope.activarSlick = function (selector) {
            $.when(
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
                })
            ).then(function () {
                if ($scope.firstSlick)
                    $scope.firstSlick = false;
                else {
                    $(".category").addClass('hide');
                    $(".category.categoria").removeClass('hide');
                    $(".navBar li").first().addClass("current");
                }

            });
        }

        $(".cd-cart footer").on("click", function () {
            console.log("footer click");

            compra = $scope.productosCarrito;

            for (var i = 0; i < compra.leght; i++) {
                if (compra[i].quantity == undefined)
                    compra[i].quantity = 1;
            }

            localStorage.compra = JSON.stringify(compra);

        });

        function toggleCart(bool) {
            var cartIsOpen = (typeof bool === 'undefined') ? cartWrapper.hasClass('cart-open') : bool;

            if (cartIsOpen) {
                cartWrapper.removeClass('cart-open');
                //reset undo
                clearInterval(undoTimeoutId);
                undo.removeClass('visible');
                cartList.find('.deleted').remove();

                setTimeout(function () {
                    cartBody.scrollTop(0);
                    //check if cart empty to hide it
                    if (Number(cartCount.find('li').eq(0).text()) == 0) cartWrapper.addClass('empty');
                }, 500);
            } else {
                cartWrapper.addClass('cart-open');
            }
        }

        function addToCart(trigger) {
            var cartIsEmpty = cartWrapper.hasClass('empty');

            updateCartCount(cartIsEmpty);
            updateCartTotal(trigger.costo, true);
            cartWrapper.removeClass('empty');
        }

        function quickUpdateCart() {
            var quantity = 0;
            var price = 0;

            cartList.children('li:not(.deleted)').each(function () {
                var singleQuantity = Number($(this).find('select').val());
                quantity = quantity + singleQuantity;
                price = price + singleQuantity * Number($(this).find('.price').text().replace('$', ''));
            });

            cartTotal.text(price.toFixed(2));
            cartCount.find('li').eq(0).text(quantity);
            cartCount.find('li').eq(1).text(quantity + 1);
        }

        function removeProduct(product, index) {
            var productQuantity = 1;

            if (product.quantity != undefined)
                productQuantity = product.quantity;

            productTotPrice = product.costo * productQuantity;

            updateCartTotal(productTotPrice, false);
            updateCartCount(true, -productQuantity);
        }

        function updateCartCount(emptyCart, quantity) {
            if (typeof quantity === 'undefined') {
                var actual = Number(cartCount.find('li').eq(0).text()) + 1;
                var next = actual + 1;

                if (emptyCart) {
                    cartCount.find('li').eq(0).text(actual);
                    cartCount.find('li').eq(1).text(next);
                } else {
                    cartCount.addClass('update-count');

                    setTimeout(function () {
                        cartCount.find('li').eq(0).text(actual);
                    }, 150);

                    setTimeout(function () {
                        cartCount.removeClass('update-count');
                    }, 200);

                    setTimeout(function () {
                        cartCount.find('li').eq(1).text(next);
                    }, 230);
                }
            } else {
                var actual = Number(cartCount.find('li').eq(0).text()) + quantity;
                var next = actual + 1;

                cartCount.find('li').eq(0).text(actual);
                cartCount.find('li').eq(1).text(next);
            }
        }

        function updateCartTotal(price, bool) {
            bool ? cartTotal.text((Number(cartTotal.text()) + Number(price)).toFixed(2)) : cartTotal.text((Number(cartTotal.text()) - Number(price)).toFixed(2));
        }
    }])


    .controller("cuentaController", ['$scope', '$http', 'Upload', function ($scope, $http, Upload) {

        $scope.usuario = JSON.parse(localStorage.usuario);

        $scope.uploadPic = function (file) {
            $('form.updateForm').validate({
                debug: true,
                rules: {
                    primerNombre: {
                        required: true
                    },
                    segundoNombre: {
                        required: false
                    },
                    apellidoPaterno: {
                        required: true
                    },
                    apellidoMaterno: {
                        required: false
                    },
                    email: {
                        required: true
                    },
                    contrasena: {
                        required: true
                    }
                },
                messages: {
                    primerNombre: {
                        required: "Tu primer nombre debe de ser especificado"
                    },
                    apellidoPaterno: {
                        required: "Necesitamos aunque sea un apellido tuyo"
                    },
                    email: {
                        required: "Necesitamos un correo para poder contactar"
                    },
                    contrasena: {
                        required: "Para modificar cambios, necesitas introducir de nuevo tu contraseña"
                    }
                },
                invalidHandler: function (event, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = errors == 1
                            ? 'Tienes un campo que no cumple con lo requerido'
                            : 'Tienes ' + errors + ' campos que no cumplen con lo requerido';
                        alert(message);
                    }
                }
            });

            if ($('form.updateForm').valid()) {
                var jsonObj = {};
                $('form.updateForm').find(".toJson").each(function (key, value) {
                    jsonObj[$(value).attr("name")] = $(value).val();
                });
                var json = JSON.stringify(jsonObj);
                Upload.upload({
                    url: '../server/php/controller/modificarPerfil.php',
                    data: {
                        image: file,
                        token: localStorage.token,
                        jsonDatos: json
                    }
                }).then(function (resp) {
                    // file is uploaded successfully
                    console.log(resp.data);
                });
            }

        };

        $scope.uploadCreditCard = function () {
            $('form.creditCardForm').validate({
                debug: true,
                rules: {
                    formaPago: {
                        required: true
                    }
                },
                messages: {
                    formaPago: {
                        required: "Tienes que especificar una forma de pago"
                    }
                },
                invalidHandler: function (event, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = errors == 1
                            ? 'Tienes un campo que no cumple con lo requerido'
                            : 'Tienes ' + errors + ' campos que no cumplen con lo requerido';
                        alert(message);
                    }
                }
            });

            if ($('form.creditCardForm').valid()) {
                //a la espera de ver como funcionara lo de la tarjeta de credito
            }
        }
    }]);

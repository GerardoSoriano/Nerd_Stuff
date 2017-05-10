var rootPath = 'office/templates/';

angular.module('app')
    .directive('nsMenu', function () {
        return {
            restrict: 'E',
            templateUrl: rootPath + 'menu.html',
            controller: 'menuController'
        };
    })
    .directive('nsHeader', function () {
        return {
            restrict: 'E',
            templateUrl: rootPath + 'header.html',
            controller: 'headerController'
        };
    })
    .directive('verifyRepeatFavoritos', function () {
        return function (scope, element, attrs) {
            if (scope.$last) {
                scope.$emit('Last-Elem-Favoritos-Event');
            }
        };
    })
    .directive('verifyRepeatUltimas', function () {
        return function (scope, element, attrs) {
            if (scope.$last) {
                scope.$emit('Last-Elem-Ultimas-Event');
            }
        };
    });
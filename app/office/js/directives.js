var rootPath = 'office/templates/';

angular.module('app')
    .directive('nsMenu', function () {
        return {
            restrict: 'E',
            templateUrl: rootPath + 'menu.html'
        };
    })
    .directive('nsHeader', function () {
        return {
            restrict: 'E',
            templateUrl:  rootPath + 'header.html'
        };
    });
var app = angular.module('courseDbApp', ['tableLoadService', 'mainCtrl']);

app.directive('customForm', function() {
    return {
        restrict: 'A'
    };
});
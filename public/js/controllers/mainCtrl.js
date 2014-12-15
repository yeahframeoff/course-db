// public/js/controllers/mainCtrl.js
var module = angular.module('mainCtrl', []);

// inject the Comment service into our controller
module.controller('mainController', ['$scope', '$http', 'TableLoad', function($scope, $http, TableLoad) {
    
    $scope.htmlRoot = "/public/html/";
    $scope.formUrl = null;
    $scope.entryData = {};
    $scope.entries = [];
    $scope.dataKeys = [];
    $scope.table = null;
    
    $scope.loading = true;

    $scope.$watch('theForm', function(form) {
        $scope.form = $scope.form || form;
    });
    
    $scope.submitEntry = function() {
        $scope.loading = true;

        TableLoad.save($scope.entryData)
            .success(function() {
                $scope.loading = false;
                $scope.entries.push($scope.entryData);
            })
            .error(function(data) {
                console.log(data);
            });
    };

    $scope.deleteEntry = function(id) {
        $scope.loading = true;

        TableLoad.destroy(id)
            .success(function() {
                $scope.load();
            });
    };
    
    $scope.load = function() {
        TableLoad.get()
            .success(function(data) {
                $scope.loading = false;
                $scope.entries = data.data;
                $scope.dataKeys = data.keys;
            })
            .error(function() {
                console.log("Smth not cool happens all the time");
                $scope.loading = false;
            });
    };
    
    $scope.changeTable = (function(s, table) {
        TableLoad.table = table;
        console.log(s.form);
        s.formUrl = table != '' ? 'form-' + table + '.html' : null;
        s.load();
        s.entryData = {};
        console.log(s);
        s.form.$setPristine(true);
    })
    .bind(this, $scope);
    
    $scope.promptSave = function() {
        debugger;
        return true;
    };
    
    $scope.notSorted = function(obj) {
        if (!obj) {
            return [];
        }
        var keys = Object.keys(obj);
        var i = keys.indexOf('$$hashKey');
        delete keys[i];
        return keys;
    }
    
    $scope.load();

}]);
    
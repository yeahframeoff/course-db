// public/js/controllers/mainCtrl.js
var module = angular.module('mainCtrl', []);

// inject the Comment service into our controller
module.controller('mainController', ['$scope', '$http', 'TableLoad', 'Dropdown',
                                     function($scope, $http, TableLoad, Dropdown) {
    
    $scope.htmlRoot = "/public/html/";
    $scope.formUrl = null;
    $scope.entryData = {};
    $scope.entries = [];
    $scope.dataKeys = [];
    $scope.table = null;
    
    $scope.$watch('theForm', function(form) {
        $scope.form = $scope.form || form;
    });

    $scope.dropdown = Dropdown;
    
    $scope.submitEntry = function() {
        console.log('Submit the entry mazafaka');
        TableLoad.save($scope.entryData)
            .success(function(data) {
                if (data.success) {
                    $scope.entryData.id = data.id;
                    $scope.entries.push($scope.entryData);
                    $scope.entryData = {};
                }
                
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
                console.log("Smth not cool happened bro");
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
        return true;
    };
    
    $scope.notSorted = function(obj) {
        if (!obj)
            return [];
        console.log(obj);
        var keys = Object.keys(obj),
            i = keys.indexOf('$$hashKey');
        delete keys[i];
        return keys;
    }
    
    $scope.load();

}]);
    
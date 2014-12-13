// public/js/controllers/mainCtrl.js
angular.module('mainCtrl', [])

    // inject the Comment service into our controller
    .controller('mainController', ['$scope', '$http', 'Teacher', function($scope, $http, Teacher) {
        // object to hold all the data for the new comment form
        $scope.teacherData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the teachers first and bind it to the $scope.teachers object
        // use the function we created in our service
        // GET ALL COMMENTS ====================================================
        Teacher.get()
            .success(function(data) {
                $scope.teachers = data;
                $scope.loading = false;
            })
            .error(function() {
                console.log("Smth not cool happens all the time");
            });

        // function to handle submitting the form
        // SAVE A COMMENT ======================================================
        $scope.submitTeacher = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            Teacher.save($scope.teacherData)
                .success(function() {
                    $scope.loading = false;
                    $scope.teachers.push($scope.teacherData);
                })
                .error(function(data) {
                    console.log(data);
                });
        };

        // function to handle deleting a comment
        // DELETE A COMMENT ====================================================
        $scope.deleteTeacher = function(id) {
            $scope.loading = true;

            // use the function we created in our service
            Teacher.destroy(id)
                .success(function() {
                    // if successful, we'll need to refresh the comment list
                    Teacher.get()
                        .success(function(data) {
                            $scope.teachers = data;
                            $scope.loading = false;
                        });

                });
        };

    }]);
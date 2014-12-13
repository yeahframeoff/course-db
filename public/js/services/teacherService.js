angular.module('teacherService', [])
    .factory('Teacher', function($http) {
        return {
            // get all the teachers
            get : function() {
                return $http.get('api/teachers');
            },

            // save a comment (pass in comment data)
            save : function(teacherData) {
                return $http({
                    method: 'POST',
                    url: '/api/teachers',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(teacherData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/teachers/' + id);
            }
        }
    });
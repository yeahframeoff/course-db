angular.module('tableLoadService', [])
    .factory('TableLoad', function($http) {
        return {
            table: null,
            // get all the teachers
            get : function() {
                return $http.get('api/' + this.table);
            },

            // save a comment (pass in comment data)
            save : function(entryData) {
                return $http({
                    method: 'POST',
                    url: '/api/' + this.table + '/' + (entryData.id || ''),
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(teacherData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/' + this.table + '/' + id);
            }
        }
    });
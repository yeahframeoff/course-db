angular.module('dropdownService', [])
    .service('Dropdown', function($http) {
        return {
            items: {},
            load: function(url, key) {
                $http.get(url).success((function(data) {
                    this.items[key] = data;
                    console.log(this.items);
                }).bind(this));
            },
            subjects: function() {
                this.load('api/custom/subjects', 'subjects');
            },
            curriculumTypes: function() {
                this.load('api/custom/curriculum-types', 'curriculum-types');
            },
            positions: function() {
                this.load('api/custom/positions', 'positions');
            },
            teachers: function() {
                this.load('api/custom/teachers', 'teachers');
            },
            curriculums: function() {
                this.load('api/custom/curriculums', 'curriculums');
            }
        };
});
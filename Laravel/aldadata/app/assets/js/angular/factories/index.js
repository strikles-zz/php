window.angular.module('promotersApp').factory('eventsService', ['$resource', '$q', '$http', function($resource, $q, $http){

    'use strict';

    return {

        getServerData: function(url) {

            // Le promise
            var defer = $q.defer();

            $http.get(url)
            .success(function (data, status, headers, config) {
                defer.resolve(data);
            }).error(function (data, status, headers, config) {
                console.log(status);
            });

            // return promise
            return defer.promise;
        },
        deleteServerData: function(url) {

            var defer = $q.defer();

            $http.delete(url)
            .success(function (data, status, headers, config) {
                defer.resolve(data);
            }).error(function (data, status, headers, config) {
                console.log(status);
            });

            return defer.promise;
        },
        postServerData: function(url, post_data) {

            var defer = $q.defer();

            $http.post(url, post_data)
            .success(function (data, status, headers, config) {
                defer.resolve(data);
            }).error(function (data, status, headers, config) {
                console.log(status);
            });

            return defer.promise;
        },
        getTemplate: function(type) {

        }
    };
}])

.factory('timepickerState', function() {

    'use strict';
    var pickers = [];

    return {
        addPicker: function(picker) {
            pickers.push(picker);
        },
        closeAll: function() {
            for (var i=0; i<pickers.length; i++) {
                pickers[i].close();
            }
        }
    };
});


// app.js

(function (angular) {
    "use strict";
    // create our angular app and inject ngAnimate and ui-router
    // =============================================================================
    var promoter_registration_app = angular.module('promotersRegistrationApp', ['ngAnimate', 'ngResource', 'ui.router', 'angular-loading-bar']);

    promoter_registration_app.factory('eventsService', ['$resource', '$q', '$http', function ($resource, $q, $http){

        //var promoter_events;
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

                // Le promise
                var defer = $q.defer();

                $http.delete(url)
                .success(function (data, status, headers, config) {
                    defer.resolve(data);
                }).error(function (data, status, headers, config) {
                    console.log(status);
                });

                // return promise
                return defer.promise;
            },
            postServerData: function(url, post_data) {

                // Le promise
                var defer = $q.defer();

                $http.post(url, post_data)
                .success(function (data, status, headers, config) {
                    defer.resolve(data);
                }).error(function (data, status, headers, config) {
                    console.log(status);
                });

                // return promise
                return defer.promise;
            }
        };
    }]);

    // configuring our routes
    // =============================================================================
    promoter_registration_app.config(function($stateProvider, $urlRouterProvider) {

        $stateProvider

            // route to show our basic form (/form)
            .state('form', {
                url: '/step',
                templateUrl: 'form.html',
                controller: 'PromoterRegistrationController'
            })

            // nested states
            // each of these sections will have their own view
            // url will be nested (/form/profile)
            .state('form.company_details', {
                url: '/company',
                templateUrl: 'company.html',
                data: { ndx: 0 }
            })

            .state('form.personal_details', {
                url: '/personal',
                templateUrl: 'personal.html',
                data: { ndx: 1 }
            })

            // url will be /form/payment
            .state('form.overview', {
                url: '/overview',
                templateUrl: 'overview.html',
                data: { ndx: 2 }
            });

        // catch all route
        // send users to the form page
        $urlRouterProvider.otherwise('/step/company');
    })

    // our controller for the form
    // =============================================================================
    .controller('PromoterRegistrationController', ['$scope', '$state', '$log', 'eventsService', function ($scope, $state, $log, eventsService) {

        // we will store all of our form data in this object

        $scope.$log = $log;

        $scope.companyData = {};
        $scope.personalData = {};
        $scope.addressData = {};

        $scope.countries = undefined;
        eventsService.getServerData('/api/v1/countries').then(function(data) {
            $scope.countries = data;

            var $li_el = $("#progressbar li");
            $li_el.removeClass("active");
            for(var curr_ndx = 0; curr_ndx <= $state.current.data.ndx; curr_ndx++){
                if(!$li_el.eq(curr_ndx).hasClass("active")) {
                    $li_el.eq(curr_ndx).addClass("active");
                }
            }
        });

        $scope.getRegistrationInfo = function() {

            eventsService.getServerData('/registration/company').then(function(data) {

                console.log(data);

                $scope.companyData.company_name = data.user_company.name;
                $scope.companyData.company_type = data.user_company.type;
                $scope.companyData.company_bank_details = data.user_company.bank_details;
                $scope.companyData.company_tax_number = data.user_company.tax_number;
                $scope.companyData.notes = data.user_company.notes;

                $scope.addressData.country_id = data.company_address.country_id;
                $scope.addressData.address = data.company_address.address;
                $scope.addressData.post_code = data.company_address.postal_code;
                $scope.addressData.city = data.company_address.city;
                $scope.addressData.state_province = data.company_address.state_province;
                $scope.addressData.phone = data.company_address.phone;
                $scope.addressData.fax = data.company_address.fax;
                $scope.addressData.website = data.company_address.website;
            });

            eventsService.getServerData('/registration/personal').then(function(data) {
                $scope.personalData.personal_phone = data.personal_phone;
                $scope.personalData.email = data.email;
            });
        };
        $scope.getRegistrationInfo();


        $scope.registrationSubmission = function(type, state) {

            // type is what we are submitting, state is where we are going
            var post_url, post_data;
            var el = document.getElementById("promotersRegistrationRoot");
            var token_str = angular.element(el).data('token');

            var ndx;
            switch(type) {

                case 'personal':
                    post_url = "/registration/personal";
                    post_data = angular.extend({}, {_token: token_str}, $scope.personalData);
                    ndx = 2;
                    break;
                case 'company':
                    post_url = "/registration/company";
                    post_data = angular.extend({}, {_token: token_str}, $scope.companyData, $scope.addressData);
                    ndx = 1;
                    break;
                default:
                    break;
            }

            eventsService.postServerData(post_url, post_data).then(function(data) {
                console.log('posted '+type+' to '+post_url, post_data, data);
            });

            var $li_el = $("#progressbar li");
            for(var curr_ndx = 0; curr_ndx <= ndx; curr_ndx++) {
                if(!$li_el.eq(curr_ndx).hasClass("active")) {
                    $li_el.eq(curr_ndx).addClass("active");
                }
            }

            // if validation ok go to next
            $state.go(state);
        };

        $scope.goBack = function(type, state) {

            var ndx;
            switch(type) {
                case 'overview':
                    ndx = 2;
                    break;
                case 'personal':
                    ndx = 1;
                    break;
                case 'company':
                    ndx = 0;
                    break;
                default:
                    break;
            }

            console.log(type, ndx);

            // overview is max atm = 4
            if(ndx < 4 && ndx > 0) {

                $("#progressbar li").eq(ndx).removeClass("active");

                // if validation ok go to next
                $state.go(state);
            }
        };

    }]);
}(window.angular));

// configuring our routes
// =============================================================================
window.angular.module('promotersApp').config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

    'use strict';

    var form = {
        name: 'form',
        templateUrl: 'form.html',
        url: '/my-events',
        controller: 'PromoterController'
    };

    var formEvents = {
        name: 'form.events',
        parent: form,
        templateUrl: 'events.html',
        abstract: true,
        url: '/events'
    };

    var formEventsBtns = {
        name: 'form.events.buttons',
        parent: formEvents,
        templateUrl: 'events_buttons.html',
        url: '/btns',
        data: {
            name: 'events'
        }
    };

    var formEventsRows = {
        name: 'form.events.rows',
        parent: formEvents,
        templateUrl: 'events_rows.html',
        url: '/rows',
        data: {
            name: 'events'
        }
    };

    var formDashboard = {
        name: 'form.dashboard',
        parent: form,
        templateUrl: 'templates/dashboard.html',
        url: '/:eventId/dashboard?taskId',
        controller: function($scope, $stateParams) {

            $scope.taskId = $stateParams.taskId;
        },
        data: {
            name: 'overview'
        }
    };

    var formG1 = {
        name: 'form.group1',
        parent: form,
        templateUrl: 'templates/group1.html',
        url: '/:eventId/group1',
        data: {
            name: '1'
        }
    };

    var formG2 = {
        name: 'form.group2',
        parent: form,
        templateUrl: 'templates/group2.html',
        url: '/:eventId/group2',
        data: {
            name: '2'
        }
    };

    var formG3 = {
        name: 'form.group3',
        parent: form,
        templateUrl: 'templates/group3.html',
        url: '/:eventId/group3',
        data: {
            name: '3'
        }
    };

    var formG4 = {
        name: 'form.group4',
        parent: form,
        templateUrl: 'templates/group4.html',
        url: '/:eventId/group4',
        data: {
            name: '4'
        }
    };

    var formEventDetails = {
        name: 'form.event_details',
        parent: form,
        templateUrl: 'event_details.html',
        abstract: true,
        url: '/:eventId/details',
        data: {
            name: 'event details'
        }
    };

    var formEventVenue = {
        name: 'form.event_venue',
        parent: formEventDetails,
        templateUrl: 'venue.html',
        url: '/venue',
        data: {
            name: 'event venue details'
        }
    };

    var formEventHospitality = {
        name: 'form.event_hospitality',
        parent: formEventDetails,
        templateUrl: 'hospitality.html',
        url: '/hospitality',
        data: {
            name: 'event hospitality details'
        }
    };

    var formEventTickets = {
        name: 'form.tickets',
        parent: form,
        templateUrl: 'tickets.html',
        url: '/:eventId/tickets',
        data: {
            name: 'tickets'
        }
    };

    // unmatched route catcher 
    $urlRouterProvider
        .otherwise('/my-events');

    // nested states
    // each of these sections will have their own view
    // url will be nested (/form/profile)
    $stateProvider
        .state(form)
        .state(formEvents)
        .state(formEventsBtns)
        .state(formEventsRows)
        .state(formDashboard)
        .state(formG1)
        .state(formG2)
        .state(formG3)
        .state(formG4)
        .state(formEventDetails)
        .state(formEventVenue)
        .state(formEventHospitality)
        .state(formEventTickets);


    // HTML5 mode
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: true
    });
}]);


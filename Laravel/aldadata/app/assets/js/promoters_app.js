// app.js

"use strict";

// if(!$('#promotersRoot').length) {
//     return false;
// }

var angular = window.angular;
var _ = window._;
// create our angular app and inject ngAnimate and ui-router
// =============================================================================
var promoter_app = angular.module('promotersApp', ['ngAnimate', 'ngResource', 'ui.router', 'angular.filter', 'ui.bootstrap', 'angularFileUpload', 'highcharts-ng', 'angular-loading-bar']);

promoter_app.filter('reverse', function() {
    return function(items) {
        return (items && items.length > 0 ? items.slice().reverse() : items);
    };
});

promoter_app.factory('eventsService', ['$resource', '$q', '$http', function($resource, $q, $http){

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

promoter_app.run(['$templateCache', '$http', function($templateCache, $http){

    $http.get('masters3.html', {

        cache: $templateCache

    }).then(function(result) {

        console.log('res', result);

        var dashboard_html = result.data;
        var dashboard_h = dashboard_html.replace('%GROUP_TASKS%', 'promoter_events[$root.event_ndx].tasks').replace('%LIMIT_FILTER%', '| limitTo:max_items');
        $templateCache.put("templates/dashboard.html", dashboard_h);

        var tour_html = result.data;
        var tour_h = tour_html.replace('%GROUP_TASKS%', 'promoter_events[$root.event_ndx].cat_tasks.group_1').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group1.html", tour_h);

        var technical_html = result.data;
        var technical_h = technical_html.replace('%GROUP_TASKS%', 'promoter_events[$root.event_ndx].cat_tasks.group_2').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group2.html", technical_h);

        var marketing_html = result.data;
        var marketing_h = marketing_html.replace('%GROUP_TASKS%', 'promoter_events[$root.event_ndx].cat_tasks.group_3').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group3.html", marketing_h);

        var travel_html = result.data;
        var travel_h = travel_html.replace('%GROUP_TASKS%', 'promoter_events[$root.event_ndx].cat_tasks.group_4').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group4.html", travel_h);
    });

}])


// configuring our routes
// =============================================================================
.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {

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
        url: '/:eventId/dashboard',
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

    // catch all route
    $urlRouterProvider.otherwise('/my-events');

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
}])

// main controller
// =============================================================================
.controller('PromoterController', ['$scope', '$rootScope', '$state', '$modal', '$log', 'eventsService', function ($scope, $rootScope, $state, $modal, $log, eventsService) {

    /////////////
    // GLOBALS //
    /////////////

    // vars
    $scope.event_id        = undefined;
    $rootScope.event_ndx   = 0;
    $scope.promoter_events = undefined;

    $scope.num_events      = 0;
    $scope.$state          = $state;

    $scope.show_rows       = true;
    $scope.show_buttons    = false;

    $scope.cats            = undefined;
    $scope.max_items       = 5;

    $scope.obj = undefined;

    $scope.venueData       = { curfew: new Date(1970, 0, 1, 0, 0, 0) };
    $scope.hospitalityData = {};

    $scope.ev_dt_setup      = undefined;
    $scope.ev_dt_break      = undefined;

    $scope.info_complete = false;

    $rootScope.active_dashboard_btn = false;
    $rootScope.active_event_btn     = false;
    $rootScope.active_venue_btn     = false;
    $rootScope.active_tickets_btn   = false;

    $scope.state_names = [];

    console.log('state params', $state.params);

    // state change event watcher
    // $rootScope.$on('$stateChangeStart', function (event, nextState, currentState) {
    //     $log.log('$state change', event, $state.params, nextState, currentState);
    // });

    // data initialization
    $rootScope.initData = function(cb) {

        $('.backdrop').css('display', 'block');
        eventsService.getServerData('/api/v1/my-events').then(function(evs) {

            $scope.promoter_events = evs;
            $scope.num_events      = $scope.promoter_events.length;

            $('.backdrop').css('display', 'none');
            $log.log('Init data', $scope.promoter_events, cb);

            if(cb)
            {
                $log.log('running cb');
                cb();
            }

            if (Object.getOwnPropertyNames($state.params).length > 0) {
                $scope.setEvent($state.params.eventId);
            }
        });
    };

    $scope.getSName = function() {

        if($state.current.name !== 'form.group1' && $state.current.name !== 'form.group2' && $state.current.name !== 'form.group3' && $state.current.name !== 'form.group4') {

            return $state.current.data.name;

        } else {

            if($scope.cats && $scope.cats.length > 0) {

                var cat_item = _.findWhere($scope.cats, {id: $state.current.data.name});
                if(cat_item) {
                    return cat_item.name;
                }
            }

        }
    };

    $scope.setFormdata = function() {

        var exploded_curfew = $scope.promoter_events[$rootScope.event_ndx].event.curfew.split(':');
        if(exploded_curfew.length > 1)
        {
            var curfew_hour = parseInt(exploded_curfew[0], 10);
            var curfew_min = parseInt(exploded_curfew[1].split('.')[0], 10);

            if(curfew_hour >= 0 && curfew_hour < 24 && curfew_min >= 0 && curfew_min < 60) {
                $scope.venueData.curfew = new Date(1970, 0, 1, curfew_hour, curfew_min, 0);
            } else {
                $scope.venueData.curfew = new Date(1970, 0, 1, 0, 0, 0);
            }
        }

        $scope.venueData.minimal_age_limit                     = $scope.promoter_events[$rootScope.event_ndx].event.minimal_age_limit;
        $scope.venueData.alcohol_license                       = $scope.promoter_events[$rootScope.event_ndx].event.alcohol_license;
        $scope.venueData.restrictions_on_merchandise_sales     = $scope.promoter_events[$rootScope.event_ndx].event.restrictions_on_merchandise_sales;
        $scope.venueData.sound_restrictions                    = $scope.promoter_events[$rootScope.event_ndx].event.sound_restrictions;

        // booked for setup from
        if($scope.promoter_events[$rootScope.event_ndx].event.booked_for_setup_from === "0000-00-00")
        {
            $scope.venueData.booked_for_setup_from = new Date();
        }
        else
        {
            //var booked_setup_date = $scope.promoter_events[$rootScope.event_ndx].event.booked_for_setup_from.split("-");
            //$scope.venueData.booked_for_setup_from = new Date(booked_setup_date[0], parseInt(booked_setup_date[1]) - 1, booked_setup_date[2]);
            $scope.venueData.booked_for_setup_from = $scope.promoter_events[$rootScope.event_ndx].event.booked_for_setup_from;
        }

        // booked for break until
        if($scope.promoter_events[$rootScope.event_ndx].event.booked_for_break_until === "0000-00-00")
        {
            $scope.venueData.booked_for_break_until = undefined;
        }
        else
        {

            $scope.venueData.booked_for_break_until = $scope.promoter_events[$rootScope.event_ndx].event.booked_for_break_until;
        }

        $scope.hospitalityData.hotel1_name                     = $scope.promoter_events[$rootScope.event_ndx].event.hotel1_name;
        $scope.hospitalityData.hotel1_website                  = $scope.promoter_events[$rootScope.event_ndx].event.hotel1_website;
        $scope.hospitalityData.hotel1_travel_time_from_airport = $scope.promoter_events[$rootScope.event_ndx].event.hotel1_travel_time_from_airport;
        $scope.hospitalityData.hotel1_travel_time_from_venue   = $scope.promoter_events[$rootScope.event_ndx].event.hotel1_travel_time_from_venue;
        $scope.hospitalityData.hotel2_name                     = $scope.promoter_events[$rootScope.event_ndx].event.hotel2_name;
        $scope.hospitalityData.hotel2_website                  = $scope.promoter_events[$rootScope.event_ndx].event.hotel2_website;
        $scope.hospitalityData.hotel2_travel_time_from_airport = $scope.promoter_events[$rootScope.event_ndx].event.hotel2_travel_time_from_airport;
        $scope.hospitalityData.hotel2_travel_time_from_venue   = $scope.promoter_events[$rootScope.event_ndx].event.hotel2_travel_time_from_venue;
    };

    $scope.cleanActiveDetailsBtns = function() {

        console.log('clearing...');

        $rootScope.active_dashboard_btn = false;
        $rootScope.active_event_btn     = false;
        $rootScope.active_venue_btn     = false;
        $rootScope.active_tickets_btn   = false;
    };


    $scope.registrationSubmission = function(type, state) {

        // type is what we are submitting, state is where we are going
        var post_url, post_data;
        var el = document.getElementById("promotersRoot");
        var token_str = angular.element(el).data('token');

        var ndx;
        switch(type) {

            case 'venue':
                post_url  = "/my-events/"+$scope.event_id+"/details/venue";
                post_data = angular.extend({}, {_token: token_str}, $scope.venueData);
                var adjusted_date = new Date($scope.venueData.curfew.getTime() - $scope.venueData.curfew.getTimezoneOffset() * 60000);
                post_data.curfew = adjusted_date;
                ndx = 1;
                break;
            case 'hospitality':
                post_url  = "/my-events/"+$scope.event_id+"/details/hospitality";
                post_data = angular.extend({}, {_token: token_str}, $scope.hospitalityData);
                ndx = 2;
                break;
            default:
                break;
        }

        eventsService.postServerData(post_url, post_data).then(function(data) {

            console.log('posted '+type+' to '+post_url, post_data, data === 'OK');
            if(data === 'OK')
            {
                $scope.info_complete = true;
                $state.transitionTo(state, {eventId: $scope.event_id});
                $rootScope.initData();
            }
        });
    };

    $scope.goBack = function(type, state) {

        var ndx;
        switch(type) {
            case 'overview':
                ndx = 2;
                break;
            case 'hospitality':
                ndx = 1;
                break;
            case 'venue':
                ndx = 0;
                break;
            default:
                break;
        }

        console.log(type, ndx);

        // overview is max atm = 4
        if(ndx < 4 && ndx > 0) {

            $(".progress_bar li").eq(ndx).removeClass("active");

            // if validation ok go to next
            //$state.go(state);
            $scope.selectEventView(state);
        }
    };

    $rootScope.setEvent = function(event_id) {

        $log.log('setEvent', event_id);
        // find the item in the array
        var new_selected = _.filter($scope.promoter_events , function(item) {
            if (item.event.id === event_id) {
                return item;
            }
        });

        // get the index
        if(new_selected.length === 0)
        {
            $scope.info_complete = false;
            $log.log('ERROR: event ndx NOT FOUND');
            return;
        }

        $scope.info_complete = new_selected[0].event.curfew !== "" && new_selected[0].event.minimal_age_limit !== "";
        $scope.event_id      = event_id;
        $rootScope.event_ndx = _.indexOf($scope.promoter_events , new_selected[0]);
        $log.log('selectEvent found ndx :)', $rootScope.event_ndx);

        $scope.setFormdata();
    };

    /////////////
    // SETTERS //
    /////////////
    $rootScope.selectEvent = function(event_id, transition_view) {

        $scope.cleanActiveDetailsBtns();
        $rootScope.setEvent(event_id);

        $log.log('Setting Event', $scope.info_complete);
    };

    $scope.selectEventView = function(view, event_id) {

        $scope.cleanActiveDetailsBtns();

        if(event_id)
        {
            $rootScope.setEvent(event_id);
        }

        $log.log('event id', $scope.event_id, event_id);

        if(!$scope.info_complete) {

            $state.transitionTo('form.event_venue', {eventId: event_id});

        } else if($scope.event_id) {

            $state.transitionTo(view, {eventId: $scope.event_id});

        } else {

            $state.transitionTo(view);
        }
    };

    //////////
    // JUNK //
    //////////
    $scope.getCats = function() {

        eventsService.getServerData('/api/v1/my-events/cats').then(function(cats) {

            $scope.state_names = [];
            $scope.cats = cats;
            $.each($scope.cats, function(key, value) {
                $scope.state_names.push(value.name);
            });
        });
    };

    $scope.catName = function(cat_id)
    {
        var ret = _.findWhere($scope.cats, {id: cat_id});
        return ret.name;
    };

    $scope.setMaxTasks = function() {

        $scope.max_items = ($scope.max_items < $scope.promoter_events[$rootScope.event_ndx].tasks.length ? $scope.promoter_events[$rootScope.event_ndx].tasks.length : 5);
    };

    $scope.toggleView = function(type)
    {
        if(type === 'rows')
        {
            $scope.show_rows = true;
            $scope.show_buttons = false;

            $('.view-sel').removeClass('active');
            $('.list-sel').addClass('active');
        }
        else
        {
            $scope.show_rows = false;
            $scope.show_buttons = true;

            $('.view-sel').removeClass('active');
            $('.btn-sel').addClass('active');
        }
    };

    $scope.getEventCompletionString = function(ev)
    {
        if(!ev)
        {
            return '0/0';
        }

        var done  = ev.details.completion.group1.completed + ev.details.completion.group2.completed + ev.details.completion.group3.completed + ev.details.completion.group4.completed;
        var total = ev.details.completion.group1.total + ev.details.completion.group2.total + ev.details.completion.group3.total + ev.details.completion.group4.total;

        return done+" / "+total;
    };

    $scope.eventsExist = function() {

        $log.log('num_events', $scope.promoter_events .length);
    };

    $scope.getTaskOpacity = function(status) {

        return (status === 'complete' ? {opacity: 0.4} : {opacity: 1});
    };

    $scope.tasksRemaining = function() {

        if($scope.promoter_events === undefined || !$scope.promoter_events.length)
        {
            return 0;
        }

        var group1_remaining = $scope.promoter_events[$rootScope.event_ndx].details.completion.group1.total - $scope.promoter_events[$rootScope.event_ndx].details.completion.group1.completed;
        var group2_remaining = $scope.promoter_events[$rootScope.event_ndx].details.completion.group2.total - $scope.promoter_events[$rootScope.event_ndx].details.completion.group2.completed;
        var group3_remaining = $scope.promoter_events[$rootScope.event_ndx].details.completion.group3.total - $scope.promoter_events[$rootScope.event_ndx].details.completion.group3.completed;
        var group4_remaining = $scope.promoter_events[$rootScope.event_ndx].details.completion.group4.total - $scope.promoter_events[$rootScope.event_ndx].details.completion.group4.completed;

        return group1_remaining + group2_remaining + group3_remaining + group4_remaining;
    };

    ///////////
    // Files //
    ///////////
    $scope.fileURL = function(task) {

        //return '/api/v1/my-events/'+task.info.events_id+'/tasks/'+task.info.id+'/upload';
        var url = 'http://s3.amazonaws.com/alda-promoters';

        return url;
    };

    $scope.getFileName = function(path) {

        var filename = path.replace(/^.*[\\\/]/, '');
        return filename;
    };

    $scope.userCreatedFile = function(logged, updated, status)
    {
        //$log.log(logged, updated, logged === updated);
        if(logged !== updated)
        {
            return false;
        }

        if(status === 'complete')
        {
            return false;
        }

        return true;
    };

    // notifications modal
    $scope.open = function (task, email_obj, size) {

        $scope.email_obj = email_obj;

        $modal.open({
            templateUrl: 'myModalContent.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, email_obj) {

                $scope.email_obj = email_obj;

                $scope.ok = function () {

                    // resolve promise and get all the things
                    eventsService.postServerData('/api/v1/my-events/'+task.info.events_id+'/tasks/'+task.info.id+'/email', {email_subject: email_obj.subject, email_content: email_obj.message}).then(function() {
                        $log.log("Notification sent...");
                    });

                    $modalInstance.dismiss('cancel');
                };

                $scope.cancel = function () {
                    $modalInstance.dismiss('cancel');
                };
            },
            resolve: {
                email_obj: function() {
                    return $scope.email_obj;
                }
            }
        });
    };

    ///////////
    // Dates //
    ///////////

    $scope.currentDate = function() {

        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        var curr_date = new Date();
        var ret = curr_date.getDate()+' '+monthNames[curr_date.getMonth()]+' '+curr_date.getFullYear();
        return ret;
    };

    $scope.str2Date = function(date){

        console.log('le date', date);

        if(!date)
        {
            return new Date();
        }

        var ed = date.split('-');
        var event_date = new Date(parseInt(ed[2], 10), parseInt(ed[1], 10)-1, parseInt(ed[0], 10));

        return event_date;
    };

    $scope.daysLeft = function(deadline) {

        // num days left till task deadline
        if(!deadline)
        {
            return -1;
        }

        var today = new Date();
        var ed = deadline.split('-');
        var event_date = new Date(parseInt(ed[0], 10), parseInt(ed[1], 10)-1, parseInt(ed[2], 10));
        var days_diff = Math.round( (event_date.getTime()-today.getTime()) / (24*60*60*1000) );

        return days_diff;
    };


    /////////
    // CSS //
    /////////
    $scope.getActive = function(type)
    {
        if(type === 'rows')
        {
            return $scope.show_rows ? 'active' : '';
        }
        else if(type === 'btns')
        {
            return $scope.show_buttons ? 'active' : '';
        }

        return '';
    };

    $scope.getBadgeCSS = function(logged, updated) {

        if(logged === updated) {
            return "same_user";
        }

        return "diff_user";

    };

    $scope.getDeadlineClass = function(due_date) {

        var days_left = $scope.daysLeft(due_date);

        var urgency_class = "urgency_green";
        if(days_left < 15)
        {
            urgency_class = "urgency_red";
        }
        else if(days_left < 20)
        {
            urgency_class = "urgency_yellow";
        }

        return urgency_class;
    };

    $scope.getEventDeadlineClass = function(due_date)
    {
        if(!due_date)
        {
            return '';
        }

        var today = new Date();
        var ed = due_date.split('-');
        var event_date = new Date(parseInt(ed[2], 10), parseInt(ed[1], 10)-1, parseInt(ed[0], 10));
        var days_left = ((event_date.getTime() - today.getTime() > 0) ? Math.round((event_date.getTime()-today.getTime()) / (24*60*60*1000)) : 0);

        //$log.log(days_left, due_date);
        var urgency_class = "urgency_green";
        if(days_left < 15)
        {
            urgency_class = "urgency_red";
        }
        else if(days_left < 20)
        {
            urgency_class = "urgency_yellow";
        }

        return urgency_class;
    };

    $scope.getCompletionBarCSS = function(tg) {

        if(!tg)
        {
            return {width: '0%'};
        }

        //console.log('tg', tg);
        var total = tg.total;
        var done = tg.completed;

        var perc = (total <= 0 ? 100 : 100*(done/total));
        return {width: perc+'%'};
    };

    $scope.getEventCompletionCSS = function(ev)
    {
        if(!ev)
        {
            return {width: '0%'};
        }

        var done = ev.details.completion.group1.completed + ev.details.completion.group2.completed + ev.details.completion.group3.completed + ev.details.completion.group4.completed;
        var total = ev.details.completion.group1.total + ev.details.completion.group2.total + ev.details.completion.group3.total + ev.details.completion.group4.total;

        var perc = (total <= 0 ? 100 : 100*(done/total));
        return {width: perc+'%'};
    };


    // init
    $scope.getCats();
    $scope.cleanActiveDetailsBtns();
    if(!$('#ticketsRoot').length)
    {
        $rootScope.initData();
        if($state.current.name === 'form') {

            if($(".default-btns").length) {
                $state.transitionTo('form.events.buttons');
            }
            else {
                $state.transitionTo('form.events.rows');
            }
        }
    }

}])


// Task Controller for per task isolated scoping
.controller('TaskController', ['$scope', '$rootScope', '$state', '$modal', '$log', '$upload', 'eventsService', function ($scope, $rootScope, $state, $modal, $log, $upload, eventsService) {

    $scope.itask = undefined;
    $scope.ifiles = undefined;
    $scope.comment = "";

    $scope.completion_status = true;
    $scope.active_status = true;

    $scope.progressPercentage = 0;
    $scope.uploadsComplete = true;

    $scope.datepicker_open = false;

    $scope.s3 = { policy: "", signature: "" };

    $scope.$watch('ufiles', function () {
        $scope.upload($scope.ufiles);
    });

    $scope.downloadFile = function(fileID) {

        $.ajax({
            url: '/taskfiles/' + fileID + '/url',
            method: 'GET',

            success : function(response) {
                console.log(response);
                //if (response.success) {
                    var downloadURL = function downloadURL(response) {
                        var hiddenIFrameID = 'hiddenDownloader',
                            iframe = document.getElementById(hiddenIFrameID);
                        if (iframe === null) {
                            iframe = document.createElement('iframe');
                            iframe.id = hiddenIFrameID;
                            iframe.style.display = 'none';
                            document.body.appendChild(iframe);
                        }
                        iframe.src = response;
                    };
                    var download = new downloadURL(response);
                //}
            }
        });
    };

    $scope.renameFile = function(file) {

        var curr_timestamp = new Date().getTime();
        var curr_day = new Date().getDate();
        var random_str = Math.random().toString(36).substr(8);

        return curr_day+'-'+random_str+'-'+file.name;
    };

    $scope.upload = function(files)
    {
        //$log.log('lll', $scope.s3policy, $scope.s3signature);
        if (files && files.length)
        {

            $('#task_'+$scope.itask.info.id+' .taskfile_progress').show();

            $scope.uploadsComplete = false;
            for (var i = 0; i < files.length; i++)
            {

                $scope.progressPercentage = 0;
                var file = files[i];
                var new_file_name = $scope.renameFile(file);

                // use me
                var dir_prefix = 'events/'+$scope.itask.info.events_id;

                $log.log('file', file);

                $upload.upload({
                    url: "https://alda-promoters.s3-eu-west-1.amazonaws.com/",         //S3 upload url including bucket name
                    method: 'POST',
                    fields : {
                        key: 'files/'+dir_prefix+'/'+new_file_name,                    // the key to store the file on S3, could be file name or customized
                        AWSAccessKeyId: "AKIAJ5YGKDS3CH3BT2MA",
                        acl: 'public-read',                             // sets the access to the uploaded file in the bucket: private or public
                        success_action_status: "201",
                        policy: $scope.s3.policy,                       // base64-encoded json policy (see article below)
                        signature: $scope.s3.signature,                 // base64-encoded signature based on policy string (see article below)
                        "Content-Type": file.type !== '' ? file.type : "application/octet-stream", // content type of the file (NotEmpty)
                        name: new_file_name,
                        Filename: 'files/'+dir_prefix+'/'+new_file_name,                // this is needed for Flash polyfill IE8-9
                    },
                    file: file
                }).progress(function (evt) {

                    $scope.progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                    $('#task_'+$scope.itask.info.id+' .progress-bar').width($scope.progressPercentage+'%');

                    var selector = '#task_'+$scope.itask.info.id;
                    var prog_selector = '#task_'+$scope.itask.info.id+' .progress-bar';

                    $log.log('progress: ' + $scope.progressPercentage + '% ' + evt.config.file.name, selector, prog_selector, $(selector).length, $(prog_selector).length);

                }).success(function (data, status, headers, config) {
                    // resolve promise and get all the things
                    eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/s3upload', {path: new_file_name, original_name: file.name}).then(function() {
                        $log.log("File uploaded...");
                        $scope.getTask($scope.itask.info.id);
                        $scope.progressPercentage = 0;
                        $scope.uploadsComplete = true;
                        $('#task_'+$scope.itask.info.id+' .progress-bar').width(0);
                        $('#task_'+$scope.itask.info.id+' .taskfile_progress').hide();
                    });
                    $log.log('file ' + config.file.name + 'uploaded. Response: ' + data);
                });
            }
        }
    };

    // hide show task details
    $scope.toggleDetails = function(task) {

        if ($scope.datepicker_open)
        {
            return false;
        }

        var $selected_row = $('#task_'+task.info.id);
        var $entry_details = $selected_row.closest('.entry_container').find('.entry_details');

        var details_display = $entry_details.css('display');
        if(details_display === 'none')
        {
            $('body').find('.entry_details').slideUp();
            $('body').find('.entry').css('color', '#555');
            $selected_row.css('color', '#000');
            $entry_details.slideDown();
        }
        else
        {
            $entry_details.slideUp();
        }
    };

    $scope.getProgressWidth = function() {
        return "{width: (progressPercentage * 100)%}";
    };

    $scope.deleteFile = function(file, task_id) {

        eventsService.postServerData('/taskfiles/'+file.id+'/delete').then(function(data) {
            $scope.getTask(task_id);
        });
    };

    $scope.setItask = function(task) {

        //$log.log(task);
        $scope.itask = task;
        $scope.comment = $scope.itask.info.comment;
        $scope.ifiles = $scope.itask.files;
    };

    $scope.getTask = function(task_id) {

        $('.backdrop').css('display', 'block');
        eventsService.getServerData('/api/v1/my-events/tasks/'+task_id).then(function(response) {

            $log.log('getTask', response, task_id);

            // get the item in the array
            var new_selected = _.filter($scope.promoter_events[$rootScope.event_ndx].tasks, function(item){
                if (item.info.id === task_id) {
                    return item;
                }
            });

            if(new_selected.length) {

                // get the index
                var task_ndx = _.indexOf($scope.promoter_events[$rootScope.event_ndx].tasks, new_selected[0]);
                // inject the task files in the global object
                $scope.promoter_events[$rootScope.event_ndx].tasks[task_ndx].files = response[0].files;
                $scope.promoter_events[$rootScope.event_ndx].tasks[task_ndx].info  = response[0].info;

                $log.log('task ndx found at: '+task_ndx);

                // same for cats
                var task_cat = new_selected[0].info.group_id;
                var cat_tasks;

                // same for cats
                var new_cat_selected = _.filter($scope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat], function(item){
                    if (item.info.id === task_id) {
                        return item;
                    }
                });

                var task_cat_ndx = _.indexOf($scope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat], new_cat_selected[0]);
                $log.log('task cat_ndx found at: '+task_cat_ndx, new_cat_selected[0]);

                if (task_cat_ndx !== -1) {
                    $scope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat][task_cat_ndx].files = response[0].files;
                    $scope.promoter_events[$rootScope.event_ndx].cat_tasks['group_'+task_cat][task_cat_ndx].info  = response[0].info;
                }

            } else {

                $log.log('ERROR: task ndx NOT FOUND');

            }

            // find task in global storage
            $scope.itask   = response[0];
            $scope.comment = $scope.itask.info.comment;
            $scope.ifiles  = $scope.itask.files;

            $('.backdrop').css('display', 'none');
        });
    };

    // comments
    $scope.saveComment = function(task) {
        // resolve promise and get all the things
        eventsService.postServerData('/api/v1/my-events/'+task.info.events_id+'/tasks/'+task.info.id+'/comment', {comment_content: $scope.comment}).then(function(response) {
            $scope.getTask(task.info.id);
        });
    };

    $scope.setStatus = function(task, $event) {

        $event.stopPropagation();
        // resolve promise and get all the things
        eventsService.postServerData('/api/v1/my-events/'+task.info.events_id+'/tasks/'+task.info.id+'/status', {task_status: $scope.completion_status}).then(function(response) {
            $rootScope.initData();
        });
    };

    $scope.setActive = function(task, $event) {

        $event.stopPropagation();
        // resolve promise and get all the things
        eventsService.postServerData('/api/v1/my-events/'+task.info.events_id+'/tasks/'+task.info.id+'/active', {active_status: $scope.active_status}).then(function(response) {
            //$scope.$parent.initData();
            $rootScope.initData();
        });
    };

    $scope.selectDate = function(date_txt) {

        $log.log('selected date', $scope.dt);
        var parsed_date, parsed_date_str;

        if(date_txt)
        {
            parsed_date_str = date_txt;
        }
        else {
            parsed_date = new Date($scope.dt);
            parsed_date_str = parsed_date.getFullYear()+'-'+(parsed_date.getMonth()+1)+'-'+parsed_date.getDate();
        }

        // resolve promise and get all the things
        eventsService.postServerData('/api/v1/my-events/'+$scope.itask.info.events_id+'/tasks/'+$scope.itask.info.id+'/due_date', {selected_date: parsed_date_str}).then(function() {
            $log.log("Task deadline set...", $scope.dt);
            $rootScope.initData();
        });
    };

    $scope.convertDate = function(date_val) {

        var exploded_date = date_val.split('-');
        var ret = exploded_date[2]+'-'+exploded_date[1]+'-'+exploded_date[0];

        return ret;
    };

}])

.controller('TicketController', ['$scope', '$rootScope', '$state', '$modal', '$log', '$upload', 'eventsService', function ($scope, $rootScope, $state, $modal, $log, $upload, eventsService) {

    $scope.selectedWeek = 0;
    $scope.selectedYear = new Date().getFullYear();
    $scope.editor_expanded = [];
    $scope.ticket_sales = [];

    $scope.grouped_tickets = [];
    $scope.last_n_weeks = null;
    $scope.num_items = 0;
    $scope.slice_start = undefined;
    $scope.slice_end = undefined;

    $scope.grand_total_cnt = 0;
    $scope.grand_total_amt = 0;

    $scope.onlyNumbers = /^\d+$/;

    $scope.chart = null;
    $scope.highcharts_config = {
        chart: {
            renderTo: 'hccontainer',
        },
        tooltip: {
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            line: {
                marker: {
                    enabled: false
                }
            },
            spline: {
                marker: {
                    enabled: false
                }
            }
        },
        xAxis: {
            title: {
                text: 'week'
            },
            tickInterval: 1
        },
        yAxis: [{ // Primary yAxis
            title: {
                text: 'Number Tickets Sold'
            },
            type: 'linear',
            min: 0
        }, { // Secondary yAxis
            title: {
                text: 'Tickets Sold Revenue'
            },
            type: 'linear',
            opposite: true
        }],
        series: [],
        title: {
            text: 'Ticket Sales'
        },
        loading: false
    };

    // generic
    $scope.init = function() {

        if($scope.promoter_events && $scope.promoter_events.length) {

            $rootScope.setEvent($state.params.eventId);

            $log.log('Running');
            // editor expanded
            var tickets_weekly_entries = $scope.promoter_events[$rootScope.event_ndx].tickets;
            for(var weekly_ndx = 0; weekly_ndx < tickets_weekly_entries.length; weekly_ndx++) {
                $scope.editor_expanded[weekly_ndx] = false;
            }

            // slice tickets into groups of 6 weeks pages
            if($('#promoterTickets').length > 0) {

                $scope.num_items = $scope.promoter_events[$rootScope.event_ndx].tickets.length;

                if($scope.slice_start === undefined) {
                    $scope.slice_start = Math.max($scope.num_items - 6, 1);

                }

                console.log('SS', $scope.slice_start);

                if($scope.slice_end === undefined) {
                    $scope.slice_end = $scope.promoter_events[$rootScope.event_ndx].tickets.length;
                    console.log('SEU', $scope.slice_end);
                } else {
                    $scope.slice_end = $scope.slice_start + Math.min(6, $scope.num_items);
                    console.log('SE', $scope.slice_end);
                }



                $scope.nonav = ($scope.num_items < 6);
                $log.log('num_items', $scope.num_items);

                $scope.last_n_weeks = $scope.promoter_events[$rootScope.event_ndx].tickets.slice($scope.slice_start, $scope.slice_end);
                $scope.curr_page = 0;
            }
        }

        // alda view
        if($('#aldaTickets').length > 0) {
            $scope.initHighCharts();
            $scope.calcGrandTotal();
        }


    };

    $scope.initHighCharts = function() {

        // highcharts points
        $scope.highcharts_config.series = [];
        //$scope.highcharts_config.xAxis.categories = [];

        var tickets_yearly_summary = $scope.promoter_events[$rootScope.event_ndx].tickets_yearly;

        var yearly_ndx = 0;
        for(yearly_ndx = 0; yearly_ndx < tickets_yearly_summary.length; yearly_ndx++) {

            $log.log(tickets_yearly_summary[yearly_ndx]);
            $scope.highcharts_config.series.push({ name: '# '+tickets_yearly_summary[yearly_ndx].name,
                                                    yAxis: 0,
                                                    type: 'line',
                                                    zIndex: 2,
                                                    data: tickets_yearly_summary[yearly_ndx].points});
        }

        $scope.highcharts_config.series.push({ name: '$ ',
                                yAxis: 1,
                                type: 'column',
                                zIndex: 1,
                                data: $scope.promoter_events[$rootScope.event_ndx].global_sales.points,
                                dashStyle: 'dash'});

        // $scope.highcharts_config.series.push({ name: 'Cumulative $ ',
        //                         yAxis: 1,
        //                         type: 'line',
        //                         data: $scope.promoter_events[$rootScope.event_ndx].global_sales.cum_points,
        //                         dashStyle: 'dash'});

        if($scope.chart)
        {
            $scope.chart.destroy();
        }
        $scope.chart = new window.Highcharts.Chart($scope.highcharts_config);

        $log.log($scope.highcharts_config.series);
    };

    $scope.getCurrency = function() {

        var currency_id = $scope.promoter_events[$rootScope.event_ndx].event.currency_id;
        var currencies = $scope.promoter_events[$rootScope.event_ndx].currencies;

        var currency_entry = _.findWhere(currencies, {id: currency_id});

        if(currency_entry) {
            return currency_entry.symbol;
        }

        return "?";

    };

    // promoters nav
    $scope.promotersNextWeek = function() {

        if($scope.nonav) {
            return;
        }

        if($scope.slice_end < $scope.num_items) {
            $scope.slice_start += 1;
            $scope.slice_end   += 1;

            $scope.last_n_weeks = $scope.promoter_events[$rootScope.event_ndx].tickets.slice($scope.slice_start, $scope.slice_end);
        }
    };

    // promoters nav
    $scope.promotersPrevWeek = function() {

        if($scope.nonav) {
            return;
        }

        if($scope.slice_start > 0) {
            $scope.slice_start -= 1;
            $scope.slice_end   -= 1;

            $scope.last_n_weeks = $scope.promoter_events[$rootScope.event_ndx].tickets.slice($scope.slice_start, $scope.slice_end);
        }
    };

    // promoters
    $scope.echoNumSold = function(tt, week) {

        // get the weekly sales entry for the given ticket type
        for(var ndx = 0; ndx < week.ticket_details.length; ndx++)
        {
            if(week.ticket_details[ndx].ticket_type.id === tt.id)
            {
                return week.ticket_details[ndx].tickets_sold ? week.ticket_details[ndx].tickets_sold.num_sold : 0;
            }
        }

        // error could not match ticket type
        return 0;
    };

    $scope.calcGrandTotal = function()
    {
        $scope.grand_total_cnt = 0;
        $scope.grand_total_amt = 0;

        var tickets_yearly_summary = $scope.promoter_events[$rootScope.event_ndx].tickets_yearly;
        for(var yearly_ndx = 0; yearly_ndx < tickets_yearly_summary.length; yearly_ndx++) {

            $scope.grand_total_cnt += tickets_yearly_summary[yearly_ndx].num_sold;
            $scope.grand_total_amt += tickets_yearly_summary[yearly_ndx].amt;
        }
    };

    // promoters
    $scope.conditionalInput = function(tt, week)
    {
        // get the weekly sales entry for the given ticket type
        for(var ndx = 0; ndx < week.ticket_details.length; ndx++)
        {
            if(week.ticket_details[ndx].ticket_type.id === tt.id)
            {
                var visible = week.ticket_details[ndx].input_visible;
                //console.log('visible', visible);

                return visible;
            }
        }

        // error could not match ticket type
        return false;
    };

    // alda
    $scope.submitWeeklyTickets = function(mode) {

        var el = document.getElementById("ticketsRoot");
        var token_str = angular.element(el).data('token');
        var post_url  = '/api/v1/my-events/'+$scope.event_id+"/event-tickets-sold";

        var form_inputs = mode === 'promoter' ? $("#promoter_sales_form input") : $("#weekly_sales_"+$scope.selectedWeek+"_"+$scope.selectedYear+" input[name=num_sold]");

        var ticket_sales_input = [];
        form_inputs.each(function(ndx, ttype_el) {

            var curr_el = angular.element(ttype_el);
            ticket_sales_input.push({ttype_id: curr_el.data('ttype'), week: curr_el.data('week'), year: curr_el.data('year'), sold: curr_el.val()});
        });

        var post_data = angular.extend({}, {_token: token_str, week: $scope.selectedWeek, year: $scope.selectedYear, sales_data: ticket_sales_input});
        eventsService.postServerData(post_url, post_data).then(function(data) {

            console.log('posted ticket sales to '+post_url, post_data, data);

            var cb = $scope.init;
            $rootScope.initData(cb);

        });
    };

    // alda
    $scope.weeklyAction = function(sales_week, sales_year) {

        console.log(sales_week, sales_year);

        if($scope.editor_expanded[sales_week]) {

            console.log('submitting sales');
            // submit
            $scope.submitWeeklyTickets('alda');
            $scope.editor_expanded[sales_week] = false;

        } else {

            console.log('expanding editor');
            // set selected
            $scope.selectedWeek = sales_week;
            $scope.selectedYear = sales_year;

            // is this what we want ???
            for(var weekly_ndx = 0; weekly_ndx < $scope.editor_expanded.length; weekly_ndx++) {
                $scope.editor_expanded[weekly_ndx] = false;
            }

            $scope.editor_expanded[sales_week] = true;

        }
    };

    $(document).ready(function() {

        if($('#ticketsRoot').length > 0)
        {
            var cb = $scope.init;
            $rootScope.initData(cb);
        }
    });

}]);

promoter_app.directive("edatepicker", function () {

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "dd-mm-yy",
                defaultDate: scope.convertDate(scope.task.info.due_date),
                onSelect: function (dateText) {
                    updateModel(dateText);
                    scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive("sdatepicker", function () {

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText) {
                    updateModel(dateText);
                    //scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive("bdatepicker", function () {

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, elem, attrs, ngModelCtrl) {

            //console.log('attrs', attrs.value);
            var updateModel = function (dateText) {
                scope.$apply(function () {
                    ngModelCtrl.$setViewValue(dateText);
                });
            };

            var options = {
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText) {
                    updateModel(dateText);
                    //scope.selectDate(scope.dt);
                },
                onClose: function () {
                    scope.datepicker_open = false;
                }
            };
            elem.datepicker(options);
        }
    };
})

.directive('datepickerPopup', function (dateFilter, datepickerPopupConfig) {
    return {
        restrict: 'A',
        priority: 1,
        require: 'ngModel',
        link: function(scope, element, attr, ngModel) {
            var dateFormat = attr.datepickerPopup || datepickerPopupConfig.datepickerPopup;
            ngModel.$formatters.push(function (value) {
                return dateFilter(value, dateFormat);
            });
        }
    };
})

.directive("timeFormat", function($filter) {
  return {
    restrict : 'A',
    require : 'ngModel',
    scope : {
      showMeridian : '=',
    },
    link : function(scope, element, attrs, ngModel) {
        var parseTime = function(viewValue) {

        if (!viewValue) {
          ngModel.$setValidity('time', true);
          return null;
        } else if (angular.isDate(viewValue) && !isNaN(viewValue)) {
          ngModel.$setValidity('time', true);
          return viewValue;
        } else if (angular.isString(viewValue)) {
          var timeRegex = /^(0?[0-9]|1[0-2]):[0-5][0-9] ?[a|p]m$/i;
          if (!scope.showMeridian) {
            timeRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
          }
          if (!timeRegex.test(viewValue)) {
            ngModel.$setValidity('time', false);
            return undefined;
          } else {
            ngModel.$setValidity('time', true);
            var date = new Date();
            var sp = viewValue.split(":");
            var apm = sp[1].match(/[a|p]m/i);
            if (apm) {
              sp[1] = sp[1].replace(/[a|p]m/i, '');
              if (apm[0].toLowerCase() === 'pm') {
                sp[0] = sp[0] + 12;
              }
            }
            date.setHours(sp[0], sp[1]);
            return date;
          }
        } else {
          ngModel.$setValidity('time', false);
          return undefined;
        }
      };

      ngModel.$parsers.push(parseTime);

      var showTime = function(data) {
        parseTime(data);
        var timeFormat = (!scope.showMeridian) ? "HH:mm" : "hh:mm a";
        return $filter('date')(data, timeFormat);
      };
      ngModel.$formatters.push(showTime);
      scope.$watch('showMeridian', function(value) {
        var myTime = ngModel.$modelValue;
        if (myTime) {
          element.val(showTime(myTime));
        }

      });
    }
  };
})

.directive('timepickerPop', function($document, timepickerState) {
      return {
        restrict : 'E',
        transclude : false,
        scope : {
          inputTime : "=",
          showMeridian : "=",
          disabled : "="
        },
        controller : function($scope, $element) {
          $scope.isOpen = false;

          $scope.disabledInt = angular.isUndefined($scope.disabled)? false : $scope.disabled;

          $scope.toggle = function() {
            if ($scope.isOpen) {
                $scope.close();
            } else {
                $scope.open();
            }
          };
        },
        link : function(scope, element, attrs) {
          var picker = {
                  open : function () {
                      timepickerState.closeAll();
                      scope.isOpen = true;
                  },
                  close: function () {
                      scope.isOpen = false;
                  }

          };
          timepickerState.addPicker(picker);

          scope.open = picker.open;
          scope.close = picker.close;

          scope.$watch("disabled", function(value) {
            scope.disabledInt = angular.isUndefined(scope.disabled)? false : scope.disabled;
          });

          scope.$watch("inputTime", function(value) {
            if (!scope.inputTime) {
              element.addClass('has-error');
            } else {
              element.removeClass('has-error');
            }

          });

          element.bind('click', function(event) {
            event.preventDefault();
            event.stopPropagation();
          });

          $document.bind('click', function(event) {
            scope.$apply(function() {
                scope.isOpen = false;
            });
          });

        },
        template : "<input type='text' class='form-control' ng-model='inputTime' ng-disabled='disabledInt' time-format show-meridian='showMeridian' ng-focus='open()' />" +
            "  <div ng-class='{open:isOpen}'> " +
            //"    <button type='button' ng-disabled='disabledInt' style='height:34px;' class='btn btn-default ' ng-class=\"{'btn-primary':isOpen}\" data-toggle='dropdown' ng-click='toggle()'> " +
            //"        <i class='glyphicon glyphicon-time'></i></button> " +
            "          <div class='dropdown-menu pull-right'> " +
            "            <timepicker ng-model='inputTime' show-meridian='showMeridian'></timepicker> " +
            "           </div> " +
            " </div>"
      };
});

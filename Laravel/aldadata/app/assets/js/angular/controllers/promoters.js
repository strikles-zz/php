// main controller
// =============================================================================
window.angular.module('promotersApp').controller('PromoterController', ['$rootScope', '$scope', '$state', '$modal', '$log', '$http','$timeout', 'eventsService', function ($rootScope, $scope, $state, $modal, $log, $http, $timeout, eventsService) {

    'use strict';

    var angular = window.angular;
    var _       = window._;

    // vars
    $scope.event_id                 = undefined;

    $scope.$state                   = $state;
    $scope.show_rows                = true;
    $scope.show_buttons             = false;
    $scope.obj                      = undefined;

    $scope.venueData                = { curfew: new Date(1970, 0, 1, 0, 0, 0) };
    $scope.hospitalityData          = {};

    $scope.ev_dt_setup              = undefined;
    $scope.ev_dt_break              = undefined;
    $scope.info_complete            = true;

    $scope.selected_event           = undefined;

    // state change event watcher
    $rootScope.$on('$stateChangeStart', function (event, nextState, currentState) {
        $log.log('$state change', event, $state.params, nextState, currentState);
    });



    $scope.setEvent = function(event_id) {

        // find the item in the array
        var new_selected = _.filter($rootScope.promoter_events , function(item) {
            $log.log('setEvent filter', item.event.id, event_id, item.event.id === event_id);
            if (parseInt(item.event.id, 10) === parseInt(event_id, 10)) {

                $rootScope.invalid_event_id = false;
                return item;
            }
        });

        // get the index
        if(new_selected.length) {

            $scope.selected_event = new_selected[0];
            $scope.event_id       = event_id;
            $rootScope.event_ndx  = _.indexOf($rootScope.promoter_events , $scope.selected_event);

            $log.log('setEvent '+event_id+' found', $scope.selected_event, 'ndx', $rootScope.event_ndx);
            $scope.setFormdata();

            if($scope.selected_event) {
                $log.log($scope.selected_event.event, $scope.selected_event.event.curfew, $scope.selected_event.event.minimal_age_limit);
                $scope.info_complete = $scope.venueData.curfew !== "" && $scope.venueData.minimal_age_limit !== "";
            }

            return;

        } else {

            //$scope.info_complete = false;
            $rootScope.invalid_event_id = true;
            $log.log('ERROR: event ndx NOT FOUND');
        }
    };

    /////////////
    // SETTERS //
    /////////////
    $rootScope.selectEvent = function(event_id, transition_view) {

        $rootScope.cleanActiveDetailsBtns();
        $scope.setEvent(event_id);

        $log.log('Setting Event', $scope.info_complete);
    };

    $scope.selectEventView = function(view, event_id) {

        $rootScope.cleanActiveDetailsBtns();
        if(event_id) {
            $scope.setEvent(event_id);
        }


        $log.log('event id', $scope.event_id, event_id);
        if(!$scope.info_complete) {
            $log.log('info_incomplete');
            $state.transitionTo('form.event_venue', {eventId: event_id});
        } else if($scope.event_id) {
            $state.transitionTo(view, {eventId: $scope.event_id});
        } else {
            $state.transitionTo(view);
        }

        if(view !== "form.dashboard" && !$state.params.taskId) {
            $(".form-container").scrollTop(0);
        }
    };

    $scope.aldaSelectEventView = function(view, event_id) {

        $rootScope.cleanActiveDetailsBtns();
        if(event_id) {
            $scope.setEvent(event_id);
        }

        $log.log('event id', $scope.event_id, event_id);
        if($scope.event_id) {
            $state.transitionTo(view, {eventId: $scope.event_id});
        } else {
            $state.transitionTo(view);
        }
    };

    $scope.init = function() {

        //the code which needs to run after dom rendering
        $log.log('state params', $state.params);
        if ($state.params.hasOwnProperty('eventId')) {
            $log.log('init $state.params.eventId -> event_id', $scope.event_id);
            $scope.event_id = $state.params.eventId;
        }

        // clear form + tickets buttons
        $rootScope.cleanActiveDetailsBtns();

        if ($scope.event_id) {
            $log.log('init setEvent event_id', $scope.event_id);
            $scope.setEvent($scope.event_id);
        }


        // expand for task urls
        if($state.params.taskId && $rootScope.promoter_events && $rootScope.cats) {

            // expand dashboard to get all tasks
            $rootScope.max_items = $rootScope.promoter_events[$rootScope.event_ndx].tasks.length;

            // find the task
            var $task = $('#task_'+$state.params.taskId);

            if($task.length) {

                var $el = $(".form-container");

                var $entry_details  = $task.closest('.entry_container').find('.entry_details');
                var details_display = $entry_details.css('display');

                //$('body').find('.entry_details').slideUp();
                $('body').find('.entry').css('color', '#555');
                $task.css('color', '#000');

                // make content large enough tp scroll in case task is at bottom
                var original_content_height = $('.content_host').height();
                $('.content_host').height(original_content_height + $('#promotersRoot').height());

                // find the task offset from the top
                console.log('task_top_offset', $task.offset().top, $el.offset().top);

                // scroll to the task
                $el.scrollTop($task.offset().top - $el.offset().top);

                $entry_details.slideDown();
            }
        }
    };

    $scope.showStatusBtns = function() {

        return $state.current.name === 'form.dashboard' ||
                $state.current.name === 'form.group1' ||
                $state.current.name === 'form.group2' ||
                $state.current.name === 'form.group3' ||
                $state.current.name === 'form.group4';

    };

    $scope.getSName = function() {

        if(!$state.current.hasOwnProperty('data') || !$state.current.data.hasOwnProperty('name')) {

            $log.log('state is missing data property');
            return '';
        }

        if ($state.current.name !== 'form.group1' &&
            $state.current.name !== 'form.group2' &&
            $state.current.name !== 'form.group3' &&
            $state.current.name !== 'form.group4') {

            return $state.current.data.name;

        } else {

            if($rootScope.cats && $rootScope.cats.length > 0) {

                $log.log('getSName cats exist');

                // its or strings id's D:
                var cat_item = _.findWhere($rootScope.cats, {id: parseInt($state.current.data.name, 10)});
                if(cat_item) {
                    $log.log('getSName - found int cat', cat_item);
                    return cat_item.name;
                } else {
                    cat_item = _.findWhere($rootScope.cats, {id: $state.current.data.name});
                    if(cat_item) {
                        $log.log('getSName - found string cat', cat_item);
                        return cat_item.name;
                    }
                }
            }
        }
    };

    $scope.setFormdata = function() {

        var exploded_curfew = $rootScope.promoter_events[$rootScope.event_ndx].event.curfew.split(':');
        if(exploded_curfew.length > 1) {

            var curfew_hour = parseInt(exploded_curfew[0], 10);
            var curfew_min = parseInt(exploded_curfew[1].split('.')[0], 10);

            if(curfew_hour >= 0 && curfew_hour < 24 && curfew_min >= 0 && curfew_min < 60) {
                $scope.venueData.curfew = new Date(1970, 0, 1, curfew_hour, curfew_min, 0);
            } else {
                $scope.venueData.curfew = new Date(1970, 0, 1, 0, 0, 0);
            }
        }

        $scope.venueData.minimal_age_limit                     = $rootScope.promoter_events[$rootScope.event_ndx].event.minimal_age_limit;
        $scope.venueData.alcohol_license                       = $rootScope.promoter_events[$rootScope.event_ndx].event.alcohol_license;
        $scope.venueData.restrictions_on_merchandise_sales     = $rootScope.promoter_events[$rootScope.event_ndx].event.restrictions_on_merchandise_sales;
        $scope.venueData.sound_restrictions                    = $rootScope.promoter_events[$rootScope.event_ndx].event.sound_restrictions;

        // booked for setup from
        if($rootScope.promoter_events[$rootScope.event_ndx].event.booked_for_setup_from === "0000-00-00")
        {
            var yyyy = $rootScope.today.getFullYear().toString();
            var mm   = ($rootScope.today.getMonth()+1).toString();
            var dd   = $rootScope.today.getDate().toString();

            $scope.venueData.booked_for_setup_from = yyyy+'-'+(mm[1]?mm:"0"+mm[0])+'-'+(dd[1]?dd:"0"+dd[0]); // padding
        }
        else
        {
            $scope.venueData.booked_for_setup_from = $rootScope.promoter_events[$rootScope.event_ndx].event.booked_for_setup_from;
        }

        // booked for break until
        if($rootScope.promoter_events[$rootScope.event_ndx].event.booked_for_break_until === "0000-00-00")
        {
            $scope.venueData.booked_for_break_until = undefined;
        }
        else
        {
            $scope.venueData.booked_for_break_until = $rootScope.promoter_events[$rootScope.event_ndx].event.booked_for_break_until;
        }

        $scope.hospitalityData.hotel1_name                     = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel1_name;
        $scope.hospitalityData.hotel1_website                  = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel1_website;
        $scope.hospitalityData.hotel1_travel_time_from_airport = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel1_travel_time_from_airport;
        $scope.hospitalityData.hotel1_travel_time_from_venue   = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel1_travel_time_from_venue;
        $scope.hospitalityData.hotel2_name                     = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel2_name;
        $scope.hospitalityData.hotel2_website                  = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel2_website;
        $scope.hospitalityData.hotel2_travel_time_from_airport = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel2_travel_time_from_airport;
        $scope.hospitalityData.hotel2_travel_time_from_venue   = $rootScope.promoter_events[$rootScope.event_ndx].event.hotel2_travel_time_from_venue;
    };

    $scope.registrationSubmission = function(type, state) {

        // type is what we are submitting, state is where we are going
        var post_url, post_data;
        var el        = document.getElementById("promotersRoot");
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

            $log.log('posted '+type+' to '+post_url, post_data, data === 'OK');
            if(data === 'OK')
            {
                $scope.info_complete = true;

                $log.log("state", state);
                //$scope.selectEventView(state, $scope.event_id);
                $state.transitionTo(state, {eventId: $scope.event_id});
                //$rootScope.initData();
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

        $log.log(type, ndx);

        // overview is max atm = 4
        if(ndx < 4 && ndx > 0) {

            $(".progress_bar li").eq(ndx).removeClass("active");

            // if validation ok go to next
            $scope.selectEventView(state);
        }
    };

    //////////
    // JUNK //
    //////////
    $scope.setMaxTasks = function() {

        if($rootScope.max_items < $rootScope.promoter_events[$rootScope.event_ndx].tasks.length) {
            $rootScope.max_items = $rootScope.promoter_events[$rootScope.event_ndx].tasks.length;
        } else {
            $rootScope.max_items = 5;
            $(".form-container").scrollTop(0);
            $log.log('>>>> new js');
        }
    };

    // switch between event rows and event btns views
    $scope.toggleView = function(type)
    {
        if(type === 'rows') {

            $scope.show_rows = true;
            $scope.show_buttons = false;

            $('.view-sel').removeClass('active');
            $('.list-sel').addClass('active');

        } else {

            $scope.show_rows = false;
            $scope.show_buttons = true;

            $('.view-sel').removeClass('active');
            $('.btn-sel').addClass('active');
        }
    };

    $scope.getEventCompletionString = function(ev)
    {
        if(!ev) {
            return '0/0';
        }

        var done  = ev.details.completion.group1.completed + ev.details.completion.group2.completed + ev.details.completion.group3.completed + ev.details.completion.group4.completed;
        var total = ev.details.completion.group1.total + ev.details.completion.group2.total + ev.details.completion.group3.total + ev.details.completion.group4.total;

        return done+" / "+total;
    };

    $scope.eventsExist = function() {

        $log.log('num_events', $rootScope.promoter_events .length);
    };

    $scope.tasksRemaining = function() {

        if($rootScope.promoter_events === undefined || !$rootScope.promoter_events.length) {
            return 0;
        }

        var group1_remaining = $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group1.total - $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group1.completed;
        var group2_remaining = $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group2.total - $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group2.completed;
        var group3_remaining = $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group3.total - $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group3.completed;
        var group4_remaining = $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group4.total - $rootScope.promoter_events[$rootScope.event_ndx].details.completion.group4.completed;

        return group1_remaining + group2_remaining + group3_remaining + group4_remaining;
    };

    // notifications modal
    $scope.openNotificationsModal = function (task, email_obj, size) {

        $scope.email_obj = email_obj;

        $modal.open({
            templateUrl: 'myModalContent.html',
            backdrop: true,
            windowClass: 'ngmodal',
            controller: function ($scope, $modalInstance, $log, email_obj) {

                $scope.email_obj = email_obj;

                $modalInstance.opened.then(function() {
                    // var e = $.Event( "ngModalOpen", { data: '' });
                    // $log.log('>>> event triggered');
                    // $(window).trigger(e);

                    $timeout(function() {
                        var windowHeight = $(window).height() ? $(window).height() : window.innerHeight,
                            top_offset = (windowHeight/2) - 210;
                        $log.log('>> OFFSET', top_offset);
                        $('.modal-content').css({
                            top: top_offset
                        });
                    });

                    $(window).resize(function() {

                        $log.log('Valid resize ???', ($(window).height()/2) - 210);
                        $('.modal-content').css({
                            top: function() {
                                return ($(window).height()/2) - 210;
                            }
                        });
                    });
                });

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

    $scope.str2Date = function(date){

        if(!date) {
            return new Date();
        }

        var ed         = date.replace(/-/g, "/");
        var event_date = new Date(ed);

        return event_date;
    };

    $scope.daysLeft = function(deadline) {

        // num days left till task deadline
        if(!deadline) {
            return -1;
        }

        var today      = new Date();
        var ed         = deadline.replace(/-/g, "/");
        var event_date = new Date(ed);
        var days_diff  = Math.round( (event_date.getTime()-today.getTime()) / (24*60*60*1000) );

        return days_diff;
    };


    /////////
    // CSS //
    /////////
    $scope.getEventDeadlineClass = function(due_date)
    {
        if(!due_date) {
            return '';
        }

        var days_left  = $scope.daysLeft(due_date);

        var urgency_class = "urgency_green";
        if(days_left < 15) {
            urgency_class = "urgency_red";
        } else if(days_left < 20) {
            urgency_class = "urgency_yellow";
        }

        return urgency_class;
    };

    $scope.getActive = function(type)
    {
        if(type === 'rows') {
            return $scope.show_rows ? 'active' : '';
        } else if(type === 'btns') {
            return $scope.show_buttons ? 'active' : '';
        }

        return '';
    };

    $scope.getCompletionBarCSS = function(tg) {

        if(!tg) {
            return {width: '0%'};
        }

        var total = tg.total;
        var done  = tg.completed;
        var perc  = (total <= 0 ? 100 : 100*(done/total));

        return {width: perc+'%'};
    };

    $scope.getEventCompletionCSS = function(ev)
    {
        if(!ev) {
            return {width: '0%'};
        }

        var done  = ev.details.completion.group1.completed + ev.details.completion.group2.completed + ev.details.completion.group3.completed + ev.details.completion.group4.completed;
        var total = ev.details.completion.group1.total + ev.details.completion.group2.total + ev.details.completion.group3.total + ev.details.completion.group4.total;
        var perc  = (total <= 0 ? 100 : 100*(done/total));

        return {width: perc+'%'};
    };

    var waitForRenderAndDoSomething = function() {

      if($http.pendingRequests.length > 0) {

          $timeout(waitForRenderAndDoSomething); // Wait for all templates to be loaded

      } else {

        //the code which needs to run after dom rendering
        $scope.init();
        if($('#promotersRoot').length) {

            if($state.current.name === 'form') {
                if($(".default-btns").length) {
                    $state.transitionTo('form.events.buttons');
                }
                else {
                    $state.transitionTo('form.events.rows');
                }
            }
        }
      }
    };
    $timeout(waitForRenderAndDoSomething); // Waits for first digest cycle
}]);


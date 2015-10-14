window.angular.module('promotersApp').run(['$http', '$log', '$rootScope', '$templateCache', '$timeout', 'eventsService',
    function($http, $log, $rootScope, $templateCache, $timeout, eventsService) {

    'use strict';

    // get templates
    $http.get('masters3.html', {

        cache: $templateCache

    }).then(function(result) {

        console.log('res', result);

        var dashboard_html = result.data;
        var dashboard_h = dashboard_html.replace('%GROUP_TASKS%', '$root.promoter_events[$root.event_ndx].tasks').replace('%LIMIT_FILTER%', '| limitTo:$root.max_items');
        $templateCache.put("templates/dashboard.html", dashboard_h);

        var tour_html = result.data;
        var tour_h = tour_html.replace('%GROUP_TASKS%', '$root.promoter_events[$root.event_ndx].cat_tasks.group_1').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group1.html", tour_h);

        var technical_html = result.data;
        var technical_h = technical_html.replace('%GROUP_TASKS%', '$root.promoter_events[$root.event_ndx].cat_tasks.group_2').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group2.html", technical_h);

        var marketing_html = result.data;
        var marketing_h = marketing_html.replace('%GROUP_TASKS%', '$root.promoter_events[$root.event_ndx].cat_tasks.group_3').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group3.html", marketing_h);

        var travel_html = result.data;
        var travel_h = travel_html.replace('%GROUP_TASKS%', '$root.promoter_events[$root.event_ndx].cat_tasks.group_4').replace('%LIMIT_FILTER%', '');
        $templateCache.put("templates/group4.html", travel_h);
    });

    /////////////
    // GLOBALS //
    /////////////

    $rootScope.cats                 = undefined;
    $rootScope.invalid_event_id     = false;
    $rootScope.event_ndx            = 0;
    $rootScope.max_items            = 5;
    $rootScope.active_dashboard_btn = false;
    $rootScope.active_event_btn     = false;
    $rootScope.active_venue_btn     = false;
    $rootScope.active_tickets_btn   = false;

    $rootScope.promoter_events      = undefined;
    $rootScope.num_events           = 0;

    $rootScope.today =              new Date();

    $rootScope.cleanActiveDetailsBtns = function() {

        $log.log('clearing...');

        $rootScope.active_dashboard_btn = false;
        $rootScope.active_event_btn     = false;
        $rootScope.active_venue_btn     = false;
        $rootScope.active_tickets_btn   = false;
    };


    $rootScope.getCats = function() {

        $('.backdrop').css('display', 'none');
        eventsService.getServerData('/api/v1/my-events/cats').then(function(cats) {
            $rootScope.cats = cats;
        });
    };

    $rootScope.initData = function(cb) {

        $('.backdrop').css('display', 'block');
        eventsService.getServerData('/api/v1/my-events').then(function(evs) {

            $rootScope.promoter_events = evs;
            $rootScope.num_events      = $rootScope.promoter_events.length;

            $log.log('InitData', $rootScope.promoter_events, 'callback', cb);
            if(cb) {
                $log.log('running cb');
                cb();
            }

            $('.backdrop').css('display', 'none');
        });
    };

    $timeout(function(){
        var cb = $rootScope.getCats();
        $rootScope.initData(cb);
    });

}]);


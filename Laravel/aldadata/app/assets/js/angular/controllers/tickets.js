window.angular.module('promotersApp').controller('TicketController', ['$scope', '$rootScope', '$state', '$modal', '$log', '$upload', 'eventsService', function ($scope, $rootScope, $state, $modal, $log, $upload, eventsService) {

    'use strict';

    var _       = window._;
    var angular = window.angular;

    $scope.selectedWeek    = 0;
    $scope.selectedYear    = new Date().getFullYear();
    $scope.editor_expanded = [];
    $scope.ticket_sales    = [];

    $scope.grouped_tickets = [];
    $scope.last_n_weeks    = null;
    $scope.num_items       = 0;
    $scope.slice_start     = undefined;
    $scope.slice_end       = undefined;

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

            // $rootScope.setEvent($state.params.eventId);
            $log.log('Running tickets controller init');

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

                $log.log('SS', $scope.slice_start);
                if($scope.slice_end === undefined) {
                    $scope.slice_end = $scope.promoter_events[$rootScope.event_ndx].tickets.length;
                    $log.log('SEU', $scope.slice_end);
                } else {
                    $scope.slice_end = $scope.slice_start + Math.min(6, $scope.num_items);
                    $log.log('SE', $scope.slice_end);
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

        var tickets_yearly_summary = $scope.promoter_events[$rootScope.event_ndx].tickets_yearly;

        var yearly_ndx = 0;
        for(yearly_ndx = 0; yearly_ndx < tickets_yearly_summary.length; yearly_ndx++) {

            //$log.log('highcharts yearly entry' tickets_yearly_summary[yearly_ndx]);
            $scope.highcharts_config.series.push({ name: '# '+tickets_yearly_summary[yearly_ndx].name,
                                                    yAxis: 0,
                                                    type: 'line',
                                                    zIndex: 2,
                                                    data: tickets_yearly_summary[yearly_ndx].points});
        }

        $scope.highcharts_config.series.push({ name: 'Revenue ',
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

        if($scope.chart) {
            $scope.chart.destroy();
        }

        $scope.chart = new window.Highcharts.Chart($scope.highcharts_config);

        $log.log('highcharts series', $scope.highcharts_config.series);
    };

    $scope.calcGrandTotal = function() {

        $scope.grand_total_cnt = 0;
        $scope.grand_total_amt = 0;
        var tickets_yearly_summary = $scope.promoter_events[$rootScope.event_ndx].tickets_yearly;
        for(var yearly_ndx = 0; yearly_ndx < tickets_yearly_summary.length; yearly_ndx++) {

            $scope.grand_total_cnt += tickets_yearly_summary[yearly_ndx].num_sold;
            $scope.grand_total_amt += tickets_yearly_summary[yearly_ndx].amt;
        }
    };

    $scope.getCurrency = function() {

        //$log.log('promoter_events', $scope.promoter_events, 'event ndx', $rootScope.event_ndx);
        if($scope.promoter_events && $rootScope.event_ndx !== undefined) {

            var currency_id    = $scope.promoter_events[$rootScope.event_ndx].event.currency_id;
            var currencies     = $scope.promoter_events[$rootScope.event_ndx].currencies;
            var currency_entry = _.findWhere(currencies, {id: currency_id});

            if(currency_entry) {
                return currency_entry.symbol;
            }
        }

        return "?";
    };

    // promoters nav
    $scope.promotersNextWeek = function() {

        if($scope.nonav) {
            return;
        }

        if($scope.slice_end < $scope.num_items) {

            $scope.slice_start  += 1;
            $scope.slice_end    += 1;
            $scope.last_n_weeks = $scope.promoter_events[$rootScope.event_ndx].tickets.slice($scope.slice_start, $scope.slice_end);
        }
    };

    // promoters nav
    $scope.promotersPrevWeek = function() {

        if($scope.nonav) {
            return;
        }

        if($scope.slice_start > 0) {

            $scope.slice_start  -= 1;
            $scope.slice_end    -= 1;
            $scope.last_n_weeks = $scope.promoter_events[$rootScope.event_ndx].tickets.slice($scope.slice_start, $scope.slice_end);
        }
    };

    // promoters
    $scope.echoNumSold = function(tt, week) {

        $log.log('echoNumSold', tt, week);

        // get the weekly sales entry for the given ticket type
        for(var ndx = 0; ndx < week.ticket_details.length; ndx++) {
            if(week.ticket_details[ndx].ticket_type.id === parseInt(tt.id, 10) || week.ticket_details[ndx].ticket_type.id === tt.id) {

                $log.log('echoNumSold found details for tickettype '+tt.id, week.ticket_details[ndx].tickets_sold);
                return week.ticket_details[ndx].tickets_sold ? week.ticket_details[ndx].tickets_sold.num_sold : 0;
            }
        }

        // error could not match ticket type
        $log.log('echoNumSold could not find details for tickettype ', tt, week);
        return 0;
    };

    // promoters
    $scope.conditionalInput = function(tt, week) {

        // get the weekly sales entry for the given ticket type
        for(var ndx = 0; ndx < week.ticket_details.length; ndx++) {

            if(week.ticket_details[ndx].ticket_type.id === tt.id) {

                var visible = week.ticket_details[ndx].input_visible;
                return visible;
            }
        }

        // error could not match ticket type
        return false;
    };

    // alda
    $scope.submitWeeklyTickets = function(mode) {

        var el        = document.getElementById("ticketsRoot");
        var token_str = angular.element(el).data('token');
        var post_url  = '/api/v1/my-events/'+$scope.event_id+"/event-tickets-sold";

        var form_inputs = mode === 'promoter' ? $("#promoter_sales_form input") : $("#weekly_sales_"+$scope.selectedWeek+"_"+$scope.selectedYear+" input[name=num_sold]");

        var ticket_sales_input = [];
        form_inputs.each(function(ndx, ttype_el) {
            var curr_el = angular.element(ttype_el);
            ticket_sales_input.push({ttype_id: curr_el.data('ttype'), week: curr_el.data('week'), year: curr_el.data('year'), sold: curr_el.val()});
        });

        var post_data = angular.extend({}, {_token: token_str, week: $scope.selectedWeek, year: $scope.selectedYear, sales_data: ticket_sales_input});
        $log.log('submitWeeklyTickets', post_data, post_url);
        eventsService.postServerData(post_url, post_data).then(function(data) {

            $log.log('submitWeeklyTickets got ', data);
            var cb = $scope.init;
            $rootScope.initData(cb);
        });
    };

    // alda
    $scope.weeklyAction = function(sales_week, sales_year) {

        $log.log('weeklyAction', sales_week, sales_year);
        if($scope.editor_expanded[sales_week]) {

            $log.log('submitting sales');
            // submit
            $scope.submitWeeklyTickets('alda');
            $scope.editor_expanded[sales_week] = false;

        } else {

            $log.log('expanding editor');
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

        if($('#ticketsRoot').length > 0) {
            var cb = $scope.init;
            $rootScope.initData(cb);
        }
    });

}]);


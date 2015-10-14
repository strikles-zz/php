//var $ = require('jquery');
var $ = global.$;
var _ = require('underscore');
var Cookies = global.Cookies;

var app = window.angular.module('procyncReporting', ['ngRoute', 'ngResource', 'angular-loading-bar', 'ngAnimate']);
var Ehighcharts = require('./charts/HighchartsGraph.js');

app.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {

    'use strict';

    $routeProvider
        .when('/reporting', {
            templateUrl: 'relations.html',
        })
        .when('/reporting/dashboard', {
            templateUrl: 'dashboard.html',
        })
        .when('/reporting/selectedgroup/:gid', {
            templateUrl: 'selectedgroup.html',
        })
        .otherwise({
            redirectTo: '/reporting'
        });

        $locationProvider.html5Mode(true);
}])

.run(['$log', '$rootScope', '$timeout', function($log, $rootScope, $timeout) {

    'use strict';
    $rootScope.globals = {};

    // initialization tasks
    $timeout(function() {
        $log.log('run');
    });

}])

.controller('ProcyncReportingController', ['$rootScope', '$scope', '$location', '$log', '$route', '$routeParams', '$timeout', '$http', 'restService',
    function($rootScope, $scope, $location, $log, $route, $routeParams, $timeout, $http, restService) {

    'use strict';

    $scope.$route = $route;
    $scope.reporting = {
        relations: undefined,
        selected: {
            relation: undefined,
            step: undefined,
            singleGroup: undefined,
            periodSpan: {selectedgroup: false, dashboard: false},
            surveyType: undefined,
            surveyGroups: undefined,
            plotOptions: {
                dashboard: {
                    participants: undefined,
                    coreSubjects: undefined,
                    singleGroup: {}
                },
                selectedGroup: undefined
            },
            allData: undefined,
            referenceEval: undefined,
            evaluationStart: undefined,
            evaluationEnd: undefined,
            evaluationStartNDX: undefined,
            evaluationEndNDX: undefined,
            quarterIntervals: undefined
        },
        fetchingData: false
    };

    $rootScope.$on("$routeChangeSuccess",function(event, next, current){
        $log.log("$routeChangeStart", event, next, current);
    });

    /**
     * [loadCookie - used to load current state post F5]
     * @return {[boolean]} [cookie was loaded]
     */
    $scope.loadCookie = function() {

        var reporting_cookie = Cookies.getJSON('reporting');
        if (!$scope.reporting.selected.relation && reporting_cookie) {
            $.extend(true, $scope.reporting.selected, reporting_cookie);
            return true;
        }

        return false;
    };

    /**
     * [saveCookie - used to save current state for F5]
     * @return {[type]} [description]
     */
    $scope.saveCookie = function() {

        var cookie_obj = {relation: undefined, step: undefined, singleGroup: undefined};

        cookie_obj.relation    = $scope.reporting.selected.relation;
        cookie_obj.step        = $scope.reporting.selected.step;
        cookie_obj.singleGroup = $scope.reporting.selected.singleGroup;

        Cookies.set('reporting', cookie_obj);
        $log.log('saving cookie', Cookies.getJSON('reporting'));
    },

    $scope.sendMail = function(content) {

        $.ajax({
          type: 'POST',
          url: 'https://mandrillapp.com/api/1.0/messages/send.json',
          data: {
            'key': 'pnOu6dp21EuoM-Oqir8zHA',
            'message': {
              'from_email': 'andre@eenvoudmedia.nl',
              'to': [
                  {
                    'email': 'andre@eenvoudmedia.nl',
                    'name': 'Andre Neto',
                    'type': 'to'
                  }
                ],
              'autotext': 'true',
              'subject': 'Procync JSON!',
              'html': content
            }
          }
         }).done(function(response) {
           $log.log(response); // if you're into that sorta thing
         });
    },

    /**
     * [validateEndPeriod - description]
     * @return {[type]} [description]
     */
    $scope.validateEndPeriod = function() {

        if(!$scope.reporting.selected.evaluationEnd || $scope.reporting.selected.evaluationEnd.period.date < $scope.reporting.selected.evaluationStart.period.date)
        {
            $scope.reporting.selected.evaluationEnd = $scope.reporting.selected.evaluationStart;
        }
    },

    /**
     * [init - initialize all the things]
     * @return {[type]} [description]
     */
    $scope.init = function() {

        $scope.reporting.fetchingData = true;

        var relation_predefined = $('.relations-selection');
        if(!relation_predefined.length) {
            relation_predefined = $('.dashboard');
        }
        if(!relation_predefined.length) {
            relation_predefined = $('.selectedgroup');
        }

        var relation_id = parseInt(relation_predefined.attr('data-evaluation'), 10);
        var query_params, query_str, is_invite = false;

        if(relation_predefined.length) {

            query_params = '&evaluation_id='+relation_id
            query_str = '/cms/wp-admin/admin-ajax.php?action=getRelation'+query_params;
            is_invite = true;

            $log.log('got invite singular rel', query_str);
        }
        else
        {
            query_str = '/cms/wp-admin/admin-ajax.php?action=getRelations';
        }

        restService.postServerData(query_str).then(function(response) {

            $log.log('relations',response);

            $scope.reporting.relations = [];
            angular.forEach(response, function(value, key) {

                var company  = {'name': value.company.post_title, 'id': value.company.ID};
                var agency   = {'name': value.agency.post_title, 'id': value.agency.ID};
                var brand    = {'name': value.brand.post_title, 'id': value.brand.ID};

                var steps = ['180'];
                if('360' === value['180_360']) {
                    steps.push('360');
                }

                var rel_literal = {
                    'name': value.post.post_title,
                    'id': value.post.ID,
                    'company': company,
                    'agency': agency,
                    'brand': brand,
                    'country': value.country,
                    '180_360': value['180_360'],
                    'steps': steps
                };

                this.push(rel_literal);

            }, $scope.reporting.relations);

            $scope.reporting.fetchingData = false;
            $scope.initializeRelations();
        });
    };

    /**
     * [initializeRelations - used for reporting token stuff]
     * @return {[type]} [description]
     */
    $scope.initializeRelations = function() {

        $scope.loadCookie();
        var is_singular_rel = false, is_singular_step = false;

        // singular rel
        if($scope.reporting.relations && $scope.reporting.relations.length === 1)
        {
            is_singular_rel = true;
            $scope.reporting.selected.relation = $scope.reporting.relations[0];
        }

        // singular steps
        if($scope.reporting.selected.relation && $scope.reporting.selected.relation.steps && $scope.reporting.selected.relation.steps.length === 1)
        {
            is_singular_step = true;
            $scope.reporting.selected.step = $scope.reporting.selected.relation.steps[0];
        }

        $log.log('singulars', is_singular_step, is_singular_rel);
        $log.log('relations', $scope.reporting.relations, $scope.reporting.selected.relation);

        // singular rel and steps
        if(is_singular_rel && is_singular_step)
        {
            // var cb = function() {
            //     $scope.setLocation('dashboard')
            // };
            // if($scope.reporting.selected.singleGroup && $route.current.templateUrl === 'selectedgroup.html') {
            //     cb = function()
            //     {
            //         $scope.setupSelectedGroupGraph();
            //         $scope.setLocation('selectedgroup/'+$scope.reporting.selected.singleGroup);
            //     }
            // }

            // $scope.fetchRelationData(cb);
            $scope.fetchRelationData($scope.setLocation('dashboard'));
        }
    }

    /**
     * [setLocation - used to change view]
     * @param {[type]} loc [description]
     */
    $scope.setLocation = function(loc) {

        $scope.saveCookie();

        if(loc.indexOf('selectedgroup') > -1) {

            var obj_json = JSON.stringify($scope.reporting);
            $scope.sendMail(obj_json);
        }
        $location.path("/reporting/"+loc);
    }

    /**
     * [toggleIndexes - used to change period span]
     * @param  {Function} cb [description]
     * @return {[type]}      [description]
     */
    $scope.toggleIndexes = function(cb)
    {
        var num_responses = $scope.reporting.selected.allData.length;
        var span = $scope.reporting.selected.periodSpan.dashboard;

        if($route.current.templateUrl === 'selectedgroup.html')
        {
            span = $scope.reporting.selected.periodSpan.selectedgroup;
        }

        if(span)
        {
            if(num_responses > 1)
            {
                $scope.reporting.selected.evaluationEndNDX = num_responses-1;
                $scope.reporting.selected.evaluationStartNDX = $scope.reporting.selected.evaluationEndNDX-1;
            }
        }
        else
        {
            $scope.reporting.selected.evaluationStartNDX = num_responses-1;
            $scope.reporting.selected.evaluationEndNDX = num_responses-1;
        }

        if(cb) {
            cb();
        }
    }

    /**
     * [setIndexes - used to initialize period span state]
     */
    $scope.setIndexes = function()
    {
        var num_responses = $scope.reporting.selected.allData.length;
        for(var i = 0; i < $scope.reporting.selected.allData.length; i++)
        {
            if($scope.reporting.selected.allData[i].period.date === $scope.reporting.selected.evaluationStart.period.date)
            {
                $scope.reporting.selected.evaluationStartNDX = i;
            }

            if($scope.reporting.selected.allData[i].period.date === $scope.reporting.selected.evaluationEnd.period.date)
            {
                $scope.reporting.selected.evaluationEndNDX = i;
            }
        }
    }

    /**
     * [fetchRelationData - fetch responses for a given relation]
     * @return {[type]} [description]
     */
    $scope.fetchRelationData = function(cb) {

        $log.log('fetchRelationdata running');

        // sanity check - No need to redo work
        if($scope.reporting.selected.allData)
        {
            $log.log('Nothing to do');
            if(cb) {
                cb();
            }
            return;
        }

        if(!$scope.reporting.selected.relation) {
            $log.log('Error: No relation has been selected');
            return false;
        }

        if(!$scope.reporting.selected.step) {
            $log.log('Error: No relation step has been selected');
            return false;
        }

        $scope.reporting.fetchingData = true;

        var query_params, query_str;
        query_params = '&relation_id='+$scope.reporting.selected.relation.id+'&step='+$scope.reporting.selected.step;
        query_str = '/cms/wp-admin/admin-ajax.php?action=getHistoricalResponses'+query_params;

        restService.postServerData(query_str).then(function(response)
        {
            $scope.reporting.selected.allData = response;
            $log.log('response', response);

            var num_responses = $scope.reporting.selected.allData.length;
            if(num_responses > 0)
            {
                $scope.reporting.selected.referenceEval = response[num_responses-1];
                $scope.reporting.selected.surveyType    = ($scope.reporting.selected.step === '360' ? 'company' : 'agency');
                $scope.reporting.selected.surveyGroups  = $scope.reporting.selected.referenceEval.groups;

                $scope.reporting.selected.evaluationStart = $scope.reporting.selected.referenceEval;
                $scope.reporting.selected.evaluationEnd   = $scope.reporting.selected.referenceEval;
                $scope.setIndexes();

                $scope.$watch("reporting.selected.evaluationStart", function(newValue, oldValue) {

                    if(oldValue) {
                        // do something
                        $scope.validateEndPeriod();
                        $scope.setIndexes();
                        //$scope.setQuarterIntervals();
                        $scope.setupGraphData();
                    }
                });

                $scope.$watch("reporting.selected.evaluationEnd", function(newValue, oldValue) {

                    if(oldValue) {
                        // do something
                        $scope.setIndexes();
                        //$scope.setQuarterIntervals();
                        $scope.setupGraphData();
                    }
                });
            }

            // done
            $scope.reporting.fetchingData = false;

            $timeout(function() {
                $scope.setupGraphData();
            });

            if(cb) {
                cb();
            }

        });
    };

    /**
     * [getGroupColor - group colors]
     * @param  {[type]} ndx [description]
     * @return {[type]}     [description]
     */
    $scope.getGroupColor = function(ndx)
    {
        var group_color = '';
        switch(ndx) {
            case 1:
                group_color = '#F9FAFC';
                break;
            case 2:
                group_color = '#F1EDE6';
                break;
            case 3:
                group_color = '#F0F3E9';
                break;
            case 4:
                group_color = '#FEF4E8';
                break;
            case 5:
                group_color = '#F1EDF9';
                break;
            default:
                group_color = '#FFFFFF';
                break;
        }

        return group_color;
    }

    /**
     * [getRoleColor - role colors]
     * @param  {[type]} role [description]
     * @return {[type]}      [description]
     */
    $scope.getRoleColor = function(role)
    {
        var series_color = '';
        if(role === 'TM') {
            series_color = '#404565';
        } else if(role === 'OM') {
            series_color = '#666fa6';
        } else if(role === 'OP') {
            series_color = '#a5abcd';
        }

        return series_color;
    }

    /**
     * [getRoleName - full role name]
     * @param  {[type]} role [description]
     * @return {[type]}      [description]
     */
    $scope.getRoleName = function(role)
    {
        var role_name = '';
        if(role === 'TM') {
            role_name = 'TOP MANAGEMENT';
        } else if(role === 'OM') {
            role_name = 'OPERATIONAL MANAGEMENT';
        } else if(role === 'OP') {
            role_name = 'OPERATIONAL';
        }

        return role_name;
    }

    /**
     * [setupGraphData - setup dashboard graphs]
     * @return {[type]} [description]
     */
    $scope.setupGraphData = function()
    {
        if(!$scope.reporting.selected.evaluationStart || !$scope.reporting.selected.evaluationEnd) {
            $log.log('something is missing');
            return;
        }

        var loc = $location.url()
        if(loc === '/reporting/dashboard')
        {
            // plots
            $scope.setupDashboardParticipantGraph();
            if($scope.reporting.selected.surveyGroups && $scope.reporting.selected.surveyGroups.hasOwnProperty('OP'))
            {
                $scope.setupDashboardAllCoreSubjectsGraph(true);
                var ndx = 0;
                for (var group in $scope.reporting.selected.surveyGroups['OP'])
                {
                    if ($scope.reporting.selected.surveyGroups['OP'].hasOwnProperty(group))
                    {
                        ndx++;
                        $scope.setupDashboardSingleGroupGraph(group, ndx);
                    }
                }
            }
        }
    };

    /**
     * [calcDashboardParticipantSeries - no company agency segmentation so we just use allData]
     * @return {[type]} [description]
     */
    $scope.calcDashboardParticipantSeries = function() {

        // role avg series
        var role_ndx  = 0;
        var role_avgs = {};
        for(var ndx = $scope.reporting.selected.evaluationStartNDX; ndx <= $scope.reporting.selected.evaluationEndNDX; ndx++)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].data;
            for (var role in evaluation_data)
            {
                // setup obj
                if(!role_avgs.hasOwnProperty(role))
                {
                    role_avgs[role] = {numerator: 0.0, denominator: 0.0, num_participants: evaluation_data[role].tot};
                }

                // ignore role if no participants
                for (var response in evaluation_data[role]['cumulative_question_scores'])
                {
                    role_avgs[role].numerator += evaluation_data[role]['cumulative_question_scores'][response];
                    role_avgs[role].denominator++;
                };
            }
        }

        // setup role points + might as well do total whilst we are iterating
        var role_series = [];
        var total_accum = {numerator: 0.0, denominator: 0.0};
        for (var role in role_avgs)
        {
            var point_value = (role_avgs[role].denominator > 0 ? role_avgs[role].numerator/role_avgs[role].denominator : 0.0);

            role_series.push(10*point_value);
            role_ndx++;

            if(!role_avgs[role].num_participants) {
                continue;
            }

            total_accum.numerator += point_value;
            total_accum.denominator++;
        }

        // total = average of roles
        var total_point = (total_accum.denominator > 0 ? total_accum.numerator/total_accum.denominator : 0.0);
        role_series.push(10*total_point);

        return role_series;
    },


    /**
     * [setupDashboardParticipantGraph - dashboard participant graph]
     * @return {[type]} [description]
     */
    $scope.setupDashboardParticipantGraph = function()
    {
        // setup options
        var hc = new Ehighcharts();
        hc.setOptions('dashboard-participants');

        // get categories
        var role_categories = [];
        for (var role in $scope.reporting.selected.referenceEval.data)
        {
            if ($scope.reporting.selected.referenceEval.data.hasOwnProperty(role))
            {
                role_categories.push($scope.getRoleName(role).toUpperCase());
            }
        }

        // add axis cats
        role_categories.push('OVERALL');
        hc.addXaxis(role_categories);

        // add series
        var role_series = $scope.calcDashboardParticipantSeries();
        hc.addSeries('', role_series);

        $scope.reporting.selected.plotOptions.dashboard.participants = hc.getOptions();
    },

    /**
     * [correctedGID - used to get the gid of a different eval since each limesurvey will have different group ID's]
     * @param  {[type]} eval_ndx [description]
     * @param  {[type]} gid      [description]
     * @return {[type]}          [description]
     */
    $scope.correctedGID = function(eval_ndx, gid) {

        if(!$scope.reporting.selected.allData[eval_ndx].groups['OM'].hasOwnProperty(gid))
        {
            var group_ndx = _.indexOf(Object.keys($scope.reporting.selected.surveyGroups['OM']), gid);
            if(group_ndx === -1)
            {
                $log.log('Hopeless: could not match GID');
                return false;
            }

            var corrected_gid = Object.keys($scope.reporting.selected.allData[eval_ndx].groups['OM'])[group_ndx];

            return corrected_gid;
        }

        return gid;
    },

    /**
     * [calcDashboardSingleGroupSeries - dashboard single group graphs data]
     * @param  {[type]} gid [description]
     * @return {[type]}     [description]
     */
    $scope.calcDashboardSingleGroupSeries = function(gid) {

        // add agency series/point
        var agency_series  = [];
        var company_series = [];
        for(var ndx = $scope.reporting.selected.evaluationStartNDX; ndx <= $scope.reporting.selected.evaluationEndNDX; ndx++)
        {
            var new_gid         = $scope.correctedGID(ndx, gid);
            var agency_accum    = {numerator: 0.0, denominator: 0.0};
            var evaluation_data = $scope.reporting.selected.allData[ndx].agency_data;
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var num_role_participants = evaluation_data[role]['tot'];
                    var group_questions       = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var response_val = evaluation_data[role]['cumulative_question_scores'][response];
                                agency_accum.numerator += response_val;
                                agency_accum.denominator++;
                            }
                        };
                    }
                }
            }

            var agency_tot = (agency_accum.denominator > 0 ? agency_accum.numerator / agency_accum.denominator : 0.0);
            agency_series.push(agency_tot);


            // add company series/point
            var company_accum = {numerator: 0.0, denominator: 0.0};
            evaluation_data   = $scope.reporting.selected.allData[ndx].company_data;
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var num_role_participants = evaluation_data[role]['tot'];
                    var group_questions       = $scope.reporting.selected.surveyGroups[role][gid]['questions'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var  response_val = evaluation_data[role]['cumulative_question_scores'][response];
                                company_accum.numerator += response_val;
                                company_accum.denominator++;
                            }
                        };
                    }
                }
            }

            var company_tot = (company_accum.denominator > 0 ? company_accum.numerator / company_accum.denominator : 0.0);
            company_series.push(company_tot);
        }

        var series = {agency: agency_series, company: company_series};

        return series;
    },

    /**
     * [setupDashboardSingleGroupGraph - dashboard single group graph options]
     * @param  {[type]} gid [description]
     * @param  {[type]} ndx [description]
     * @return {[type]}     [description]
     */
    $scope.setupDashboardSingleGroupGraph = function(gid, index) {

        // setup graph
        var chartOptions = require('./charts/charts-templates.js');
        var tmp_options  = chartOptions['dashboard-singlegroup'];
        var options      = angular.extend({}, tmp_options);
        options.series   = [];

        $log.log('len 2', $scope.reporting.selected.allData.length, 'start', $scope.reporting.selected.evaluationStartNDX, 'end', $scope.reporting.selected.evaluationEndNDX);
        if($scope.reporting.selected.evaluationStartNDX !== $scope.reporting.selected.evaluationEndNDX) {
            options.yAxis.gridLineWidth      = 1;
            options.yAxis.minorGridLineWidth = 1;
            options.yAxisminorTickLength     = 1;
            options.yAxis.tickLength         = 1;
            options.yAxis.labels.enabled     = true;
        } else {
            options.yAxis.gridLineWidth      = 0;
            options.yAxis.minorGridLineWidth = 0;
            options.yAxisminorTickLength     = 0;
            options.yAxis.tickLength         = 0;
            options.yAxis.labels.enabled     = false;
        }

        // calc group average benchmark
        var role_benchmarks = {};
        for (var role in $scope.reporting.selected.surveyGroups)
        {
            if ($scope.reporting.selected.surveyGroups.hasOwnProperty(role))
            {
                var benchmark_accum = {numerator: 0.0, denominator: 0.0, avg: 0.0};
                var group_questions = $scope.reporting.selected.surveyGroups[role][gid]['questions'];
                for (var question in $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'])
                {
                    var question_benchmark = $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'][question];
                    benchmark_accum.numerator += question_benchmark;
                    benchmark_accum.denominator++;
                }

                benchmark_accum.avg = (benchmark_accum.denominator > 0 ? benchmark_accum.numerator/benchmark_accum.denominator : 0.0);
                if(!role_benchmarks.hasOwnProperty(role))
                {
                    role_benchmarks[role] = benchmark_accum.avg;
                }
            }
        }

        // calc total avg benchmark
        var benchmark_avg = {numerator: 0.0, denominator: 0.0, avg: 0.0};
        for (var role in role_benchmarks)
        {
            benchmark_avg.numerator += role_benchmarks[role];
            benchmark_avg.denominator++;
        }
        benchmark_avg.avg = (benchmark_avg.denominator > 0 ? benchmark_avg.numerator/benchmark_avg.denominator : 0.0);

        // agency + company series
        var series = $scope.calcDashboardSingleGroupSeries(gid);
        var agency_data = [];
        var company_data = [];

        for(var i=0; i<series.agency.length; i++) {
            series.agency[i] *= 10;
        }
        for(var i=0; i<series.company.length; i++) {
            series.company[i] *= 10;
        }

        options.series.push({name: 'agency', visible: false, data: series.agency, color:'#f28d4f'});
        options.series.push({name: 'company', visible: false, data: series.company, color:'#5169b2'});

        options.yAxis.plotLines.push({
            value: 10*benchmark_avg.avg,
            color: 'black',
            dashStyle: 'shortdot',
            width: 1,
            zIndex: 999
        });

        $scope.reporting.selected.plotOptions.dashboard.singleGroup[gid] = options;
    },

    /**
     * [calcAllCoresubjects - dashboard all core subjects graph data]
     * @param  {[type]} type [description]
     * @return {[type]}      [description]
     */
    $scope.calcAllCoresubjects = function(type) {

        var series = [];
        var data = [];

        // setup group accum
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var role_data = {};
            var evaluation_data = $scope.reporting.selected.allData[ndx][type+'_data'];
            for (var role in evaluation_data)
            {
                if(evaluation_data.hasOwnProperty(role))
                {
                    var accum = {};
                    for(var gid in $scope.reporting.selected.surveyGroups[role])
                    {
                        if(!accum.hasOwnProperty(gid))
                        {
                            accum[gid] = {numerator: 0.0, denominator: 0.0, avg: 0.0};
                        }

                        // calc role questions avg
                        var num_role_participants = evaluation_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var new_gid              = $scope.correctedGID(ndx, gid);
                            var group_role_questions = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                            for (var response in evaluation_data[role]['cumulative_question_scores'])
                            {
                                // check question is valid for role
                                if(group_role_questions.indexOf(response) > -1)
                                {
                                    accum[gid].numerator += evaluation_data[role]['cumulative_question_scores'][response];
                                    accum[gid].denominator++;
                                }
                            };

                            accum[gid].avg = (accum[gid].denominator > 0 ? accum[gid].numerator/accum[gid].denominator : 0.0);
                        }
                    }

                    if(!role_data.hasOwnProperty(role))
                    {
                        role_data[role] = accum;
                    }
                }
            }

            data.push({date: $scope.reporting.selected.allData[ndx].period.date, accum: role_data});
        }

        $log.log('>>> data', data);
        var gid_accum = {};
        for(var i = 0; i < data.length; i++)
        {
            var curr_data = data[i];
            for (var role in curr_data.accum)
            {
                var role_aggr = curr_data.accum[role];
                for(gid in role_aggr)
                {
                    if (!gid_accum.hasOwnProperty(gid))
                    {
                        gid_accum[gid] = {numerator: 0.0, denominator: 0.0};
                    }

                    if(role_aggr[gid].denominator > 0)
                    {
                        gid_accum[gid].numerator += role_aggr[gid].avg;
                        gid_accum[gid].denominator++;
                    }
                }
            }
        }
        for(gid in gid_accum)
        {
            var point_val = (gid_accum[gid].denominator > 0 ? gid_accum[gid].numerator/gid_accum[gid].denominator : 0.0);
            if(type === 'agency')
            {
                series.push({y: point_val, marker: {symbol: 'url(/content/themes/procync/app/assets/images/orange.png)'}});
            } else {
                series.push({y: point_val, marker: {symbol: 'url(/content/themes/procync/app/assets/images/blue.png)'}});
            }
        }

        return series;
    }

    /**
     * [setupDashboardAllCoreSubjectsGraph - dashboard all core subjects graph options]
     * @param  {[type]} dom_id         [description]
     * @param  {[type]} add_categories [description]
     * @return {[type]}                [description]
     */
    $scope.setupDashboardAllCoreSubjectsGraph = function(is_dashboard) {

        var hc = new Ehighcharts();
        var chart_template_name = (is_dashboard ? 'dashboard-allcoresubjects' : 'allcoresubjects');
        hc.setOptions(chart_template_name);// setup xAxis

        // axis + cats
        var categories = [];
        var axis_dates = [];

        for (var group in $scope.reporting.selected.surveyGroups['OP'])
        {
            categories.push($scope.reporting.selected.surveyGroups['OP'][group]['name'].toUpperCase());
        }
        hc.addXaxis(categories);

        var agency_series  = $scope.calcAllCoresubjects('agency');
        var company_series = $scope.calcAllCoresubjects('company');

        hc.addSeries('agency', agency_series, '#f28d4f');
        hc.addSeries('company', company_series, '#5169b2');

        var group_benchmark_accum = {};
        for(var ndx = $scope.reporting.selected.evaluationStartNDX; ndx <= $scope.reporting.selected.evaluationEndNDX; ndx++)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].company_data
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    for (var gid in $scope.reporting.selected.surveyGroups['OP'])
                    {
                        // init accum
                        if(!group_benchmark_accum.hasOwnProperty(gid)) {
                            group_benchmark_accum[gid] = {numerator: 0.0, denominator: 0.0, avg: 0.0};
                        }

                        // compute client role response avgs
                        var num_role_participants = evaluation_data[role]['tot'];
                        var group_role_questions  = $scope.reporting.selected.surveyGroups[role][gid]['questions'];
                        if(num_role_participants)
                        {
                            for (var role_response in evaluation_data[role]['cumulative_question_scores'])
                            {
                                var valid_role_question = group_role_questions.indexOf(role_response);
                                if(valid_role_question > -1)
                                {
                                    group_benchmark_accum[gid].numerator += $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'][role_response];
                                    group_benchmark_accum[gid].denominator++;
                                }
                            };
                        }
                    }
                }
            }
        }

        var benchmark_series = [];
        for(var group in group_benchmark_accum) {

            if(group_benchmark_accum.hasOwnProperty(group)) {
                group_benchmark_accum[group].avg = (group_benchmark_accum[group].denominator > 0 ? group_benchmark_accum[group].numerator/group_benchmark_accum[group].denominator : 0.0);
                benchmark_series.push({y: group_benchmark_accum[group].avg, marker: {symbol: 'url(/content/themes/procync/app/assets/images/black.png)'}});
            }
        }

        hc.addSeries('benchmark', benchmark_series, '#000000', 'shortdot');

        if(is_dashboard)
        {
            $scope.reporting.selected.plotOptions.dashboard.core_sujects = hc.getOptions();
        }
        else
        {
            $scope.reporting.selected.plotOptions.core_sujects = hc.getOptions();
        }
    },


    /**
     * [plotSelectedGroupGraph - selected group graph data + options]
     * @return {[type]} [description]
     */
    $scope.setupSelectedGroupGraph = function() {

        // setup graph
        var hc = new Ehighcharts();
        hc.setOptions('selected-group');

        var categories = [];
        var axis_dates = [];

        $log.log('>>> selectedGroup', $scope.reporting.selected.singleGroup);

        // setup xAxis for data grouping
        var group_questions = $scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['questions'];
        for(var q in $scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['questions_txt'])
        {
            categories.push($scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['questions_txt'][q].toUpperCase());
        }

        hc.addXaxis(categories);

        // roles series
        var allData = [];
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var accum           = {date: $scope.reporting.selected.allData[ndx].period.date, role_data: {}, role_questions: {}};
            var evaluation_data = $scope.reporting.selected.allData[ndx].data;
            $log.log('>>> evaluation_data', $scope.reporting.selected.allData[ndx]);
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    if(!accum.role_data.hasOwnProperty(role))
                    {
                        accum.role_data[role] = [];
                    }

                    if(!accum.role_questions.hasOwnProperty(role))
                    {
                        accum.role_questions[role] = 0.0;
                    }

                    var new_gid = $scope.correctedGID(ndx, $scope.reporting.selected.singleGroup);
                    var group_questions  = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    for (var question in group_questions)
                    {
                        if(evaluation_data[role]['cumulative_question_scores'].hasOwnProperty(group_questions[question]))
                        {
                            accum.role_data[role].push(10*evaluation_data[role]['cumulative_question_scores'][group_questions[question]]);
                            accum.role_questions[role]++;
                        }
                        else
                        {
                            accum.role_data[role].push(0);
                        }
                    };
                }
            }

            allData.push(accum);
        }

        // role data
        $log.log('>>>>> allData', allData, $scope.reporting.selected.evaluationStartNDX, $scope.reporting.selected.evaluationEndNDX);
        for(var evaluation in allData)
        {
            $log.log('eval', allData[evaluation]);
            for(var role in allData[evaluation].role_data)
            {
                if(allData[evaluation].role_data.hasOwnProperty(role))
                {
                    var series_color = $scope.getRoleColor(role);
                    hc.addSeries(role+allData[evaluation].date, allData[evaluation].role_data[role], series_color);
                }
            }

            var total_series = [];
            var total_accum  = {};
            for (var role in allData[evaluation].role_data)
            {
                for(var q in allData[evaluation].role_data[role])
                {
                    if(!total_accum.hasOwnProperty(q))
                    {
                        total_accum[q] = {numerator: 0.0, denominator: 0.0, avg: 0.0};
                    }

                    if(allData[evaluation].role_data[role][q] > 0)
                    {
                        total_accum[q].numerator += allData[evaluation].role_data[role][q];
                        total_accum[q].denominator++;
                    }
                }
            }

            for(var q in total_accum)
            {
                $log.log('ta', total_accum[q]);
                total_accum[q].avg = (total_accum[q].denominator > 0 ? total_accum[q].numerator/total_accum[q].denominator : 0);
                total_series.push(total_accum[q].avg);
            }

            hc.addSeries('total'+allData[evaluation].date, total_series, '#725a0b');
        }

        // benchmark
        var benchmark_series = [];
        var num_responses    = $scope.reporting.selected.allData.length;
        var benchmark_data   = $scope.reporting.selected.allData[num_responses - 1].groups['OP'][$scope.reporting.selected.singleGroup].question_benchmarks;
        for(var bench in benchmark_data) {
            benchmark_series.push(10*benchmark_data[bench]);
        }
        hc.addSeries('benchmark', benchmark_series, '#000000');

        $scope.reporting.selected.plotOptions.selectedGroup = hc.getOptions();
    },

    /**
     * [getIconClass - wrapper class for displaying the icons]
     * @param  {[type]} number [description]
     * @return {[type]}        [description]
     */
    $scope.getIconClass = function(number) {

        number = Math.abs(number);
        if (number <= 0.2) {
            return 'performance-icon icon-good';
        }
        if (number > 0.2 && number <= 1) {
            return 'performance-icon icon-improvements-needed';
        }
        if (number > 1) {
            return 'performance-icon icon-immediate-action';
        }
    },

    /**
     * [getClientvsBenchmark - calculate client-benchmark avg for a group]
     * @param  {[type]} gid [description]
     * @return {[type]}     [description]
     */
    $scope.getClientvsBenchmark = function(gid) {

        var company_tot  = 0.0;
        var accum_client_role_weights = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].company_data
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    // compute client role response avgs
                    var num_role_participants = evaluation_data[role]['tot'];
                    var new_gid               = $scope.correctedGID(ndx, gid);
                    var group_role_questions  = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    if(num_role_participants)
                    {
                        for (var role_response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var valid_role_question = group_role_questions.indexOf(role_response);
                            if(valid_role_question > -1)
                            {
                                var response_value     = evaluation_data[role]['cumulative_question_scores'][role_response];
                                var response_benchmark = $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'][role_response];
                                company_tot += (response_value - response_benchmark);
                                accum_client_role_weights++;
                            }
                        };
                    }
                }
            }
        }

        var ret = (accum_client_role_weights > 0 ? company_tot / accum_client_role_weights : 0.0);
        return ret.toFixed(1);
    },

    /**
     * [getClientvsAgencyBenchmark - calculate clientAvg-agencyAvg for a group]
     * @param  {[type]} gid [description]
     * @return {[type]}     [description]
     */
    $scope.getClientvsAgencyBenchmark = function(gid) {

        // add agency series/point
        var agency_tot = 0.0;
        var agency_weights_accum = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].agency_data
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var new_gid               = $scope.correctedGID(ndx, gid);
                    var group_questions       = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    var num_role_participants = evaluation_data[role]['tot'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var response_value = evaluation_data[role]['cumulative_question_scores'][response];
                                agency_tot += response_value;
                                agency_weights_accum++;
                            }
                        };
                    }
                }
            }
        }

        // add company series/point
        var company_tot           = 0.0;
        var company_weights_accum = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].company_data
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var new_gid               = $scope.correctedGID(ndx, gid);
                    var group_questions       = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    var num_role_participants = evaluation_data[role]['tot'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var response_value = evaluation_data[role]['cumulative_question_scores'][response];
                                company_tot += response_value;
                                company_weights_accum++;
                            }
                        };
                    }
                }
            }
        }

        var agency_avg  = agency_weights_accum > 0 ? agency_tot/agency_weights_accum : 0.0;
        var company_avg = company_weights_accum > 0 ? company_tot/company_weights_accum : 0.0;

        var ret = company_avg - agency_avg;
        return ret.toFixed(1);
    },

    /**
     * [getOverallBenchmark - calculate overall reponse avg for a group]
     * @param  {[type]} gid [description]
     * @return {[type]}     [description]
     */
    $scope.getOverallBenchmark = function(gid) {

        // add agency series/point
        var agency_tot            = 0.0;
        var agency_weights_accum  = 0.0;

        // add company series/point
        var company_tot           = 0.0;
        var company_weights_accum = 0.0;

        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var evaluation_data = $scope.reporting.selected.allData[ndx].agency_data;
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var new_gid               = $scope.correctedGID(ndx, gid);
                    var group_questions       = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    var num_role_participants = evaluation_data[role]['tot'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var response_value     = evaluation_data[role]['cumulative_question_scores'][response];
                                var response_benchmark = $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'][response];
                                agency_tot += (response_value - response_benchmark);
                                agency_weights_accum++;
                            }
                        };
                    }
                }
            }

            evaluation_data = $scope.reporting.selected.allData[ndx].company_data
            for (var role in $scope.reporting.selected.company_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    var new_gid               = $scope.correctedGID(ndx, gid);
                    var group_questions       = $scope.reporting.selected.allData[ndx].groups[role][new_gid]['questions'];
                    var num_role_participants = evaluation_data[role]['tot'];
                    if(num_role_participants)
                    {
                        for (var response in evaluation_data[role]['cumulative_question_scores'])
                        {
                            var question_valid = group_questions.indexOf(response);
                            if(question_valid > -1)
                            {
                                var response_value     = evaluation_data[role]['cumulative_question_scores'][response];
                                var response_benchmark = $scope.reporting.selected.surveyGroups[role][gid]['question_benchmarks'][response];
                                company_tot += (response_value - response_benchmark);
                                company_weights_accum++;
                            }
                        };
                    }
                }
            }
        }

        var numerator   = (agency_tot + company_tot);
        var denominator = (agency_weights_accum + company_weights_accum);
        if(denominator <= 0)
        {
            $log.log('getOverallBenchmark Error: denominator <= 0');
        }

        var ret = denominator > 0 ? numerator/denominator : -9999;
        return ret.toFixed(1);
    },

    /**
     * [getQClientvsBenchmark - calculate client-benchmark avg for a question]
     * @param  {[type]} question [description]
     * @return {[type]}          [description]
     */
    $scope.getQClientvsBenchmark = function(question) {

        //calc
        var question_tot   = 0.0;
        var question_accum = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var evaluation_data    = $scope.reporting.selected.allData[ndx].company_data;
            var question_benchmark = $scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['question_benchmarks'][question];
            for (var role in evaluation_data)
            {
                if (evaluation_data.hasOwnProperty(role))
                {
                    if(evaluation_data[role]['cumulative_question_scores'].hasOwnProperty(question) &&
                        $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'].hasOwnProperty(question))
                    {
                        var num_role_participants = evaluation_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var response_value     = evaluation_data[role]['cumulative_question_scores'][question];
                            var response_benchmark = $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'][question];
                            question_tot += (response_value - response_benchmark);
                            question_accum++;
                        }
                    }
                }
            }
        }

        var ret = (question_accum > 0 ? (question_tot/question_accum): 0.0);
        return ret.toFixed(1);
    },

    /**
     * [getQClientvsAgencyBenchmark - calculate clientAvg-agencyAvg for a group]
     * @param  {[type]} question [description]
     * @return {[type]}          [description]
     */
    $scope.getQClientvsAgencyBenchmark = function(question) {

        // company
        var company_tot   = 0.0;
        var company_accum = 0.0;

        // agency
        var agency_tot    = 0.0;
        var agency_accum  = 0.0;

        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var company_data = $scope.reporting.selected.allData[ndx].company_data;
            for (var role in company_data)
            {
                if (company_data.hasOwnProperty(role))
                {
                    if(company_data[role]['cumulative_question_scores'].hasOwnProperty(question) &&
                        $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'].hasOwnProperty(question))
                    {
                        var num_role_participants = company_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var response_value = company_data[role]['cumulative_question_scores'][question];
                            company_tot += response_value;
                            company_accum++;
                        }
                    }
                }
            }

            var agency_data = $scope.reporting.selected.allData[ndx].agency_data;
            for (var role in agency_data)
            {
                if (agency_data.hasOwnProperty(role))
                {
                    if(agency_data[role]['cumulative_question_scores'].hasOwnProperty(question) &&
                        $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'].hasOwnProperty(question))
                    {
                        var num_role_participants = agency_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var response_value = agency_data[role]['cumulative_question_scores'][question];
                            agency_tot += response_value;
                            agency_accum++;
                        }
                    }
                }
            }
        }

        var agency_avg  = agency_accum > 0 ? agency_tot/agency_accum : 0.0;
        var company_avg = company_accum > 0 ? company_tot/company_accum : 0.0;
        var ret = company_avg - agency_avg;

        return ret.toFixed(1);
    },

    /**
     * [getQOverallBenchmark - calculate overall reponse avg for a question]
     * @param  {[type]} question [description]
     * @return {[type]}          [description]
     */
    $scope.getQOverallBenchmark = function(question) {

        // company
        var company_tot   = 0.0;
        var company_accum = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var company_data = $scope.reporting.selected.allData[ndx].company_data;
            for (var role in company_data)
            {
                if (company_data.hasOwnProperty(role))
                {
                    if(company_data[role]['cumulative_question_scores'].hasOwnProperty(question) &&
                        $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'].hasOwnProperty(question))
                    {
                        var num_role_participants = company_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var response_benchmark = $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'][question];
                            var response_value     = company_data[role]['cumulative_question_scores'][question];

                            company_tot += (response_value - response_benchmark);
                            company_accum++;
                        }
                    }
                }
            }
        }

        // agency
        var agency_tot = 0.0;
        var agency_accum = 0.0;
        for(var ndx = $scope.reporting.selected.evaluationEndNDX; ndx >= $scope.reporting.selected.evaluationStartNDX; ndx--)
        {
            var agency_data = $scope.reporting.selected.allData[ndx].agency_data;
            for (var role in agency_data)
            {
                if (agency_data.hasOwnProperty(role))
                {
                    if(agency_data[role]['cumulative_question_scores'].hasOwnProperty(question) &&
                        $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'].hasOwnProperty(question))
                    {
                        var num_role_participants = agency_data[role]['tot'];
                        if(num_role_participants)
                        {
                            var response_benchmark = $scope.reporting.selected.surveyGroups[role][$scope.reporting.selected.singleGroup]['question_benchmarks'][question];
                            var response_value     = agency_data[role]['cumulative_question_scores'][question];

                            agency_tot += (response_value - response_benchmark);
                            agency_accum++;
                        }
                    }
                }
            }
        }

        var ret = ((company_tot + agency_tot)/(company_accum + agency_accum));
        return ret.toFixed(1);
    },

    /**
     * [getColumnsClass description]
     * @return {[type]} [description]
     */
    $scope.getColumnsClass = function() {

        var ret = '';
        if($scope.reporting.selected.surveyGroups && $scope.reporting.selected.surveyGroups.hasOwnProperty('OP'))
        {
            var num_groups        = Object.keys($scope.reporting.selected.surveyGroups['OP']).length + 1;
            var num_cols_per_item = Math.floor(12 / num_groups);
            ret                   = 'col-sm-'+num_cols_per_item;
        }

        return ret;
    };

    /**
     * [getQuestionsColumnsClass description]
     * @return {[type]} [description]
     */
    $scope.getQuestionsColumnsClass = function() {

        var ret = '';
        if($scope.reporting.selected.surveyGroups && $scope.reporting.selected.surveyGroups.hasOwnProperty('OP'))
        {
            if($scope.reporting.selected.singleGroup && $scope.reporting.selected.surveyGroups['OP'].hasOwnProperty($scope.reporting.selected.singleGroup))
            {
                var num_questions     = Object.keys($scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['questions']).length + 1;
                var num_cols_per_item = Math.floor(12 / num_questions);
                ret                   = 'col-sm-'+num_cols_per_item;
            }
        }

        return ret;
    };

    /**
     * [getQuestionsColumnsClassComplement description]
     * @return {[type]} [description]
     */
    $scope.getQuestionsColumnsClassComplement = function() {

        var ret = '';
        if($scope.reporting.selected.surveyGroups && $scope.reporting.selected.surveyGroups.hasOwnProperty('OP'))
        {
            if($scope.reporting.selected.singleGroup && $scope.reporting.selected.surveyGroups['OP'].hasOwnProperty($scope.reporting.selected.singleGroup))
            {
                var num_questions     = Object.keys($scope.reporting.selected.surveyGroups['OP'][$scope.reporting.selected.singleGroup]['questions']).length + 1;
                var num_cols_per_item = Math.floor(12 / num_questions);
                ret                   = 'col-sm-'+(12-num_cols_per_item);
            }
        }

        return ret;
    };

    /**
     * [getColumnsClassComplement description]
     * @return {[type]} [description]
     */
    $scope.getColumnsClassComplement = function() {

        var ret = '';
        if($scope.reporting.selected.surveyGroups && $scope.reporting.selected.surveyGroups.hasOwnProperty('OP'))
        {
            var num_groups        = Object.keys($scope.reporting.selected.surveyGroups['OP']).length + 1;
            var num_cols_per_item = Math.floor(12 / num_groups);
            ret                   = 'col-sm-'+(12-num_cols_per_item);
        }

        return ret;
    };

    /**
     * [getGroupsClass description]
     * @param  {[type]} group_ndx [description]
     * @return {[type]}           [description]
     */
    $scope.getGroupsClass = function(group_ndx) {

        var groups_class = '';

        switch(group_ndx) {
            case 0:
                groups_class = 'group-color1';
                break;
            case 1:
                groups_class = 'group-color2';
                break;
            case 2:
                groups_class = 'group-color3';
                break;
            case 3:
                groups_class = 'group-color4';
                break;
            case 4:
                groups_class = 'group-color5';
                break;
            default:
               groups_class = 'group-color1';
               break
        }

        return groups_class;
    }


    /**
     * [waitForRenderAndDoSomething description]
     * @return {[type]} [description]
     */
    var waitForRenderAndDoSomething = function() {

        // Wait for all templates to be loaded
        if($http.pendingRequests.length > 0) {
            $timeout(waitForRenderAndDoSomething);
        } else {
            $scope.init();
        }
    };

    // Waits for first digest cycle
    $timeout(waitForRenderAndDoSomething);

}])

.directive('chart', function ($log, $timeout) {

    return {
        restrict: 'E',
        replace: true,
        template: '<div></div>',
        scope: {
            config: '='
        },
        link: function (scope, element, attrs) {
            var chart;
            var process = function () {

                // sanity check
                if(!scope.config) {
                    $log.log('Error: No config found');
                    return false;
                }

                var config               = angular.extend({}, scope.config);
                config.chart.renderTo    = element[0];
                config.chart.events      = {};
                config.chart.events.load = function()
                {
                    var chart = this;
                    $timeout(function()
                    {
                        for(var series_ndx in chart.series)
                        {
                            chart.series[series_ndx].show();
                        }
                    });
                };
                chart = new Highcharts.Chart(config);
                $timeout(function() {
                    chart.reflow();
                }, 500);
            };

            process();

            scope.$watch("config.series", function (loading) {
                process();
            });
            scope.$watch("config.loading", function (loading) {
                if (!chart) {
                    return;
                }
                if (loading) {
                    chart.showLoading();
                } else {
                    chart.hideLoading();
                }
            });
        }
    };
})

.factory('restService', ['$resource', '$q', '$http', function($resource, $q, $http){

    'use strict';
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

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
        }
    };
}]);



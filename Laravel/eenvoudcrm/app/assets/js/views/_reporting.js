'use strict';

/**
 * [Reporting - constructor]
 */
var Reporting = function() {

    this.subscriptions_report_data = [];
    this.worklogs_reports_data = [];

};

Reporting.prototype = {

    /**
     * [init - object initialization]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    init: function(options) {

        var self = this;
        self.initColors(options);
        self.initData(options);
        self.initCharts(options);
    },
    /**
     * [initColors]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initColors: function(options) {

        var self = this;

        // Make monochrome colors and set them as default for all pies
        window.Highcharts.getOptions().plotOptions.pie.colors = (function () {

            var colors = [],
                base = window.Highcharts.getOptions().colors[0],
                i;

            for (i = 0; i < 10; i += 1) {
                // Start out with a darkened base color (negative brighten), and end
                // up with a much brighter color
                colors.push(window.Highcharts.Color(base).brighten((i - 3) / 7).get());
            }

            return colors;
        }());
    },
    /**
     * [initData - get data to populate graphs]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initData: function(options) {

        var self = this;

        var $worklogs_project_entries,
            $subscriptions_servicecat_entries,
            grand_total_subscriptions_revenue = 0,
            grand_total_subscriptions_occurrences = 0,
            grand_total_worklogs_time = 0,
            grand_total_worklogs_occurrences = 0;

        if(options && options.view === 'company') {

            $worklogs_project_entries         = options.page.$el.find(".project-section");
            $subscriptions_servicecat_entries = options.page.$el.find(".servicecat-section");
        }
        else {

            $worklogs_project_entries         = $(".project-section");
            $subscriptions_servicecat_entries = $(".servicecat-section");
        }

        //console.log('reporting entries', $worklogs_project_entries.length, $subscriptions_servicecat_entries.length);
        //console.log('reporting entries', options.page.$el.html());

        $worklogs_project_entries.each(function(ndx, $el) {

            var project_name              = $(this).find('.project-label h4').text();

            var total_project_time        = 0;
            var $project_time_entries     = $(this).find('.worklog-entry .user-totaltime');
            $project_time_entries.each(function(user_ndx, $user_time) {

                var project_time = parseFloat($(this).text().replace(/\./g,'').replace(/\,/g, '.'));
                total_project_time += project_time;
                grand_total_worklogs_time += project_time;
            });
            $(this).find('.project-totalminutes').text(total_project_time.toString().replace(/\./g, ','));

            var total_project_occurrences   = 0;
            var $project_occurrence_entries = $(this).find('.worklog-entry .user-occurrences');
            $project_occurrence_entries.each(function(user_ndx, $user_time) {

                var project_occurrences = parseFloat($(this).text().replace(/\./g,'').replace(/\,/g, '.'));
                total_project_occurrences += project_occurrences;
                grand_total_worklogs_occurrences += project_occurrences;
            });
            $(this).find('.project-totaloccurrences').text(total_project_occurrences);

            self.worklogs_reports_data.push([project_name, total_project_time]);
        });
        $('#worklogs_report table.totals .minutes_total').text(grand_total_worklogs_time);
        $('#worklogs_report table.totals .worklogs_total').text(grand_total_worklogs_occurrences);

        $subscriptions_servicecat_entries.each(function(ndx, $el) {

            var servicecat_name              = $(this).find('.servicecat-label h4').text();

            var total_servicecat_revenue     = 0;
            var $servicecat_revenue_entries  = $(this).find('.service-entry .service-totalprice');
            $servicecat_revenue_entries.each(function(service_ndx, $service_revenue) {

                var servicecat_revenue = parseFloat($(this).text().replace(/\./g,'').replace(/\,/g, '.'));
                total_servicecat_revenue += servicecat_revenue;
                grand_total_subscriptions_revenue += servicecat_revenue;

                console.log('service revenue', $(this).text(), total_servicecat_revenue, grand_total_subscriptions_revenue);
            });
            $(this).find('.servicecat-totalprice').text(total_servicecat_revenue.toFixed(2).toString().replace(/\./g, ','));

            var total_servicecat_occurrences = 0;
            var $servicecat_occurrence_entries  = $(this).find('.service-entry .service-occurrences');
            $servicecat_occurrence_entries.each(function(service_ndx, $service_revenue) {

                var servicecat_occurrences = parseFloat($(this).text().replace(/\./g,'').replace(/\,/g, '.'));
                total_servicecat_occurrences += servicecat_occurrences;
                grand_total_subscriptions_occurrences += servicecat_occurrences;
            });
            $(this).find('.servicecat-totaloccurrences').text(total_servicecat_occurrences);

            self.subscriptions_report_data.push([servicecat_name, total_servicecat_revenue]);

        });
        $('#subscriptions_report table.totals .revenue_total').text(grand_total_subscriptions_revenue.toFixed(2).toString().replace(/\./g, ','));
        $('#subscriptions_report table.totals .occurrences_total').text(grand_total_subscriptions_occurrences);

        console.log('>>> RD', self.worklogs_reports_data, self.subscriptions_report_data);

    },
    /**
     * [initCharts - create charts]
     * @param  {[type]} options [description]
     * @return {[type]}         [description]
     */
    initCharts: function(options) {

        var self = this;

        var $subscriptions_el,
            $worklogs_el;

        if(options && options.view === 'company') {

            $subscriptions_el = options.page.$el.find('#subscriptions_report_graph_container');
            $worklogs_el      = options.page.$el.find('#worklogs_report_graph_container');

        } else {

            $subscriptions_el = $('#subscriptions_report_graph_container');
            $worklogs_el      = $('#worklogs_report_graph_container');
        }

        // Build the chart
        $subscriptions_el.highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Subscriptions by service type, 2014'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (window.Highcharts.theme && window.Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'service share',
                data: self.subscriptions_report_data
            }]
        });

        // Build the chart
        $worklogs_el.highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Worklogs by project, 2014'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (window.Highcharts.theme && window.Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'project share',
                data: self.worklogs_reports_data
            }]
        });
    },
    /**
     * [document_ready_cb - callback]
     * @return {[type]} [description]
     */
    document_ready_cb: function() {

        var self = this;

        if(!$('#reporting-container').length)
        {
            return;
        }

        self.init();


    },
    /**
     * [ajax_pageloaded_cb - callback]
     * @param  {[type]} e [description]
     * @return {[type]}   [description]
     */
    ajax_pageloaded_cb: function(e) {

        var self = this;

        var page       = e.page;
        var company_id = page.modelID;
        var $body      = page.$el;

        if(!$body.find('#reporting-container').length)
        {
            return;
        }

        var options = { view: "company", page: e.page, company_id: page.modelID };
        self.init(options);
    }
};

module.exports = new Reporting();

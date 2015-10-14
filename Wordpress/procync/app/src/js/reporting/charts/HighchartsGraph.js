'use strict';

var HighchartsGraph = function() {

    this.options;

    // if (!global.charts) {
    //  global.charts = [];
    // }
    // global.charts.push(self);
    // return self;
};


HighchartsGraph.prototype = {

    /**
     * [setOptions - given a chart type get the options object and store it]
     * @param {[type]} chart_type [description]
     */
    setOptions: function(chart_type) {

        var self = this;

        var chartOptions = require('./charts-templates.js');
        self.options = chartOptions[chart_type];
        self.options.series = [];
    },

    getOptions: function() {

        var self = this;

        return self.options;
    },

    /**
     * [addXaxis - creates categories as xAxis labels]
     * @param {[type]} categories [description]
     */
    addXaxis: function(categories) {

        var self = this;

        self.options.xAxis.categories = categories;
    },

    /**
     * [addYaxis - creates categories as yAxis labels]
     * @param {[type]} categories [description]
     */
    addYaxis: function(categories) {

        var self = this;

        self.options.yAxis.categories = categories;
    },

    /**
     * [addSeries - adds a series and gives it a name and color]
     * @param {[type]} series_name  [description]
     * @param {[type]} series_data  [description]
     * @param {[type]} series_color [description]
     */
    addSeries: function(series_name, series_data, series_color, series_dashstyle) {

        var self = this;
        var series_entry = {name: series_name, visible: false, data: series_data};

        if(series_color) {
            series_entry.color = series_color;
        }

        if(series_dashstyle) {
            series_entry.dashStyle = series_dashstyle;
        }

        self.options.series.push(series_entry);
    },

    /**
     * [setBackgroundColor - set HC background color]
     * @param {[type]} color [description]
     */
    setBackgroundColor: function(color) {

        var self = this;
        self.options.chart.backgroundColor = color;
    },

    /**
     * [setYaxisBenchmark - draw benchmark line]
     * @param {[type]} val [description]
     */
    setYaxisBenchmark: function(val) {

        var self = this;
        self.options.yAxis.plotLines[0].value = val;
    },

    /**
     * [renderGraph - renders the graph]
     * @return {[type]} [description]
     */
    renderGraph: function() {

        var self = this;

        if(!self.chart) {
            self.chart = new window.Highcharts.Chart(self.options);
        }

        /*
        else {
            self.chart.redraw();
        }
        */
    }
};

module.exports = HighchartsGraph;

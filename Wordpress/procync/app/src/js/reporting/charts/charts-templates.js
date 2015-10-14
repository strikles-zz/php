Highcharts.setOptions({
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        backgroundColor:'rgba(255, 255, 255, 0.1)',
        plotShadow: false
    },
    exporting: {
        enabled: false
    },
    credits: {
        enabled: false
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        column: {
            borderWidth: 0,
            colorByPoint:false
        },
        bar: {
            pointWidth: 20
        },
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                 enabled: false
            },
            showInLegend: true
        }
    },
});

var chartTemplates = {

    'dashboard-participants': {

        chart: {
            type: 'bar',
            renderTo: undefined
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        legend: {
            enabled: false
        },
        yAxis: {
            min: 20,
            title: {
                text: null
            },
            plotLines: [{
                value: 65,
                color: 'red',
                dashStyle: 'shortdot',
                width: 1,
                zIndex: 999,
                label: {
                    text: '-delta'
                }
            }, {
                value: 75,
                color: 'red',
                dashStyle: 'shortdot',
                width: 1,
                zIndex: 999,
                label: {
                    text: '+delta'
                }
            }, {
                value: 70,
                color: 'green',
                width: 2,
                zIndex: 999,
                label: {
                    text: 'Benchmark'
                }
            }]
        },
        xAxis: {
            categories: undefined
        },
        tooltip: {
            //pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f}</b><br/>',
            headerFormat: ''
        },
        plotOptions: {
            bar: {
                colorByPoint: true,
                colors: ['#a5abcd', '#666fa6', '#404565', '#6f5706']
            }
        },
        series: []
    },

    'dashboard-allcoresubjects': {

        chart: {
            polar: true,
            renderTo: undefined
        },
        pane: {
            startAngle: 0,
            endAngle: 360
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: undefined,
            tickmarkPlacement: 'on',
            lineWidth: 0,
            title: {
                text: null
            },
        },
        yAxis: [{
            gridLineInterpolation: 'circle',
            lineWidth: 0,
            allowDecimals: false,
            min: 0,
            title: {
                text: null
            },
        },{
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
            allowDecimals: false,
            min: 0,
            title: {
                text: null
            },
        }],
        tooltip: {
            //pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f}</b><br/>',
            headerFormat: ''
        },
        legend: {
            align: 'left',
            verticalAlign: 'top',
            layout: 'vertical'
        },
        plotOptions: {},
        series: []
    },

    'dashboard-singlegroup': {

        chart: {
            type: 'column',
            renderTo: undefined,
            backgroundColor: '#FFFFFF'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            minorTickLength: 0,
            tickLength: 0,
            lineColor: 'transparent',
            labels: {
              enabled: false
            },
            title: {
                text: null
            }
        },
        yAxis: {
            gridLineWidth: 0,
            minorGridLineWidth: 0,
            min: 0,
            max: 100,
            title: {
                text: null
            },
            labels: {
                enabled: true
            },
            plotLines: []
        },
        tooltip: {
            //pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f}</b><br/>',
            headerFormat: ''
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true,
                    crop: false,
                    format: '{point.y:,.0f}'
                }
            }
        },
        series: []
    },

    'selected-group': {

        chart: {
            type: 'column',
            renderTo: undefined
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: undefined
        },
        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ''
            }
        },
        tooltip: {
            //pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f}</b><br/>',
            headerFormat: ''
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                dataLabels: {
                    enabled: true,
                    crop: false,
                    format: '{point.y:,.0f}'
                }
            }
        },
        series: []
    },

    'allcoresubjects': {

        chart: {
            type: 'line',
            renderTo: undefined
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: undefined,
            title: {
                text: null
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            //pointFormat: '<span style="color:{point.color}">\u25CF</span> {series.name}: <b>{point.y:.1f}</b><br/>',
            headerFormat: ''
        },
        plotOptions: {},
        series: []
    }
};



module.exports = chartTemplates;

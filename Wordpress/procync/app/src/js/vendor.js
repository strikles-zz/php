'use strict';

global.$ = global.jQuery;

require('../vendor/history.js-1.8.0/scripts/bundled/html4+html5/native.history.js');

// questionaire
require('gsap');
require('rangeslider.js');
//require('jquery.cookie');
//
global.Cookies = require('js-cookie');

// ios8 safari - hi, I am the successor to ie6 non-sense junk
global.platform = require('platform');
require('brim/node_modules/scream');
require('brim');

// reporting
global._                   = require('underscore');
global.angular             = require('angular');
global.angular_route       = require('angular-route');
global.angular_resource    = require('angular-resource');
global.angular_loading_bar = require('angular-loading-bar');
global.angular_animate     = require('angular-animate');
global.highcharts          = require('../vendor/Highcharts-4.1.6/js/highcharts.src.js');
global.highcharts_more     = require('../vendor/Highcharts-4.1.6/js/highcharts-more.src.js');
global.highcharts_export   = require('../vendor/Highcharts-4.1.6/js/modules/exporting.src.js');


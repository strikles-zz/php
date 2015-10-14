'use strict';


global.App = {

    debug: require('./_debug.js'),
    question: require('./survey/_question.js'),
    survey: require('./survey/_survey.js'),
    reporting: require('./reporting/reporting.js')
};

(function($) {

	//var $ = require('jquery');
    $( document ).ready(function() {

        // var $parent_el = $("#brim-main");
        // //console.log(navigator.userAgent.toLowerCase().indexOf('safari/') > -1);
        // if (platform.name === 'Safari' && platform.os.family === 'iOS' && parseInt(platform.os.version, 10) > 8 || platform.ua.indexOf('like Mac OS X') != -1) {

        //     var scream,
        //         brim;

        //     scream = gajus.Scream({
        //         width: {
        //             portrait: 320,
        //             landscape: 640
        //         }
        //     });

        //     brim = gajus.Brim({
        //         viewport: scream
        //     });

        //     brim.on('viewchange', function (e) {
        //         document.body.className = e.viewName;
        //     });

        // } else {
        //     $parent_el = $('#not-ios-8');
        //     $('#not-ios-8').css('display', 'block');
        // }

    	if($('.procyncRoot').length || $('.procyncIntro').length) {
        	global.App.survey.init();
        }

    });

})(global.jQuery);

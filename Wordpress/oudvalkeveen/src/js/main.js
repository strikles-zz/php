'use strict';

var $ = jQuery;

require('velocity-animate');
require('./panels');
require('./grid-elements');
require('./gallery');
require('./weather');

require('velocity-animate/velocity.ui');
require('bootstrap-sass/assets/javascripts/bootstrap.min');

require('./pages/_front-page');
require('./pages/_etickets');


require('./test');

$( document ).ready(function() {

	windowResizer();
	$('a.colorbox').colorbox();

	if ($('body.home').length) {
		require('./twitter');
	}

});

$(window).load(function() {
	animatedLogo();
});


var windowResizer = function() {
	$('body').show();
	var height = window.innerHeight,
		offset = $('body').offset().top;

	$('body').css('min-height', height - offset);
}

var animatedLogo = function() {
	var $el = $('div.logo-container'),
		$ballen = $el.find('.ballen'),
		value = 360, //animate to
      	steps = 1, //animation steps per frame (1/60sec.)
      	time = (1000/60)*(value/steps),  //animation time
      	completeValue;

    //console.log(time);

	repeat();

	// $el.on('mouseover', function() {
	// 	steps = 4;
	// 	log();
	// 	$ballen.velocity('stop');
	// 	$ballen.velocity({rotateZ: value}, {duration:time * completeValue,easing:'linear',complete: function() {
	// 		console.log('complete 1 cycle');
	// 		repeat();
	// 	}});
	// });

	// $el.on('mouseout', function() {
	// 	steps = 1;
	// 	log();
	// 	$ballen.velocity('stop');
	// 	$ballen.velocity({rotateZ: value}, {duration:time * completeValue,easing:'linear',complete: function() {
	// 		console.log('complete 1 cycle');
	// 		repeat();
	// 	}});
	// });

	function log() {
		console.log('time', time);
		console.log('factored time', time * completeValue);
		console.log('value', value);
	}

	function repeat() {
		// log();
		// console.log('starting loop');
		$ballen.velocity({rotateZ: [value, 0]}, {duration:time,easing:'linear',loop:true, progress: function(elements, complete, remaining, start, tweenValue) {
			completeValue = complete;
			//console.log(complete);
		}});
	}

}



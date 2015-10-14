'use strict';

var $ = global.jQuery;
global.velocity = require('velocity-animate');


$(function() {

	if (!$('body.home').length) {
		return;
	}

	var resizeTimer;

	var resizeYoutube = function() {
		clearTimeout(resizeTimer);

		resizeTimer = setTimeout(function() {
			var $container = $('.youtube-container'),
				$iframe = $container.find('iframe'),
				$outer = $container.parent(),
				ratio = 305 / 171,
				ratio2 = 1 / 1.55;
				

			//console.log(ratio);

			$container.width('100%')
				.height($container.width() / 475 * 253 + 50);

			var ratio3 = 475 / 253 * $container.width() / 470;

			//console.log(ratio3);

			$iframe.width($outer.width() * ratio2)
				.height($outer.width() / ratio * ratio2)
				.css({
					marginTop: (17 * ratio3),
					marginLeft: (21.5 * ratio3)
				});
		}, 100);
	}


	resizeYoutube();

	$(window).resize(resizeYoutube);


	var cloud=$(".weather"),
		ease={queue:true,duration:2000},
		cloudAnimation = function(){
			cloud.animate({right:"-=25px",top:"-=10px"}, ease)
				.animate({right:"+=25px",top:"+=10px"}, ease)
				.animate({right:"+=25px",top:"-=10px"}, ease)
				.animate({right:"-=25px",top:"+=10px"}, ease)
				.delay(1000);
		},
		animateCloud = function() {
			setInterval(function() {
				cloudAnimation();
			},10000);
		};

	cloudAnimation();
	animateCloud();

});
'use strict';

var $ = global.jQuery;
global.velocity = require('velocity-animate');


$(function() {

	if (!$('body.page-template-template-tickets, body.page-template-template-abonnementen').length) {
		return;
	}

	if ( 0 && $(window).width() < 768 ) {
		$('nav.navbar').removeClass('navbar-fixed-top').css({
			position: 'absolute',
			top: 0,
			left: '20px',
			'z-index': 10001
		});
		$('#content').css({
			'margin-top': '30px'
		});
	}

	var resizeTimer;

	var resizeIframe = function() {
		clearTimeout(resizeTimer);

		resizeTimer = setTimeout(function() {
			var $iframe = $('#eticket-iframe'),
				$container = $iframe.parent(),
				marginTop = parseInt($('#content').css('margin-top'), 10),
				windowHeight = $(window).height(),
				height = 600,
				width;

			$iframe.css('width', '100%');
			//$iframe.width($container.outerWidth(false) + 15)
			// $iframe.css('max-height', windowHeight - marginTop);
			$iframe.css('z-index', 10000);
		}, 100);
	}


	resizeIframe();

	$(window).resize(resizeIframe);
});
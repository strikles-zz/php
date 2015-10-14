/*global _:true*/
'use strict';


// var settings = { apiKey: 'AIzaSyCHHmaEdjqqS9q5C8JsF-y46tguwq6eXrY'};
// $.getScript("https://maps.googleapis.com/maps/api/js?v=3.exp&key=" + settings.apiKey + "&callback=initGoogleMaps");

// Set debug to false to disable all console.logs
var App = global.App = {
	debug: 			true,
	initialized: 	false,
	resizers: 		[],
	gmap: 			require('./_googlemaps'),
	slider: 		require('./_slider')
};

var	$ = require('jQuery');

// Turn of console.log for unsupportedbrowsers and when debug is set to false;
//require('./modules/_console');

$(document).ready(function() {

	console.log('Eenvoud Foundetion');

	_.each(App.resizers, function(resizer) {
		resizer();
	});

	$('.specifications-row').removeClass('container');
	// $('.specifications-row table tr td').each(function() {
	//     var text = $(this).text();
	//     console.log('text', text);
	//     text = text.replace('</p>', "");
	//     text = text.replace('<p>', "");
	//     $(this).text(text);
	// });

	//global.google = window.google;

	// gmaps
	$('.acf-map').each(function(){
		App.gmap.render_map($(this));
	});

	if ($('body .slider-container:first').length > 0) {

		var slider = new global.App.slider({
			debug:				false,
			container:			$('body .slider-container:first'),
			left:				$('body .slider-container:first .arrow.left'),
			right:				$('body .slider-container:first .arrow.right'),
		});
		slider.init().start();
	}

});

$(window).load(function() {

	App.initialized = true;
	//console.log(App.initialized);

	_.each(App.resizers, function(resizer) {
		resizer();
	});

});

var resizeTimer;

$(window).resize(function() {
	clearTimeout(resizeTimer);
	resizeTimer = setTimeout(function() {
		_.each(App.resizers, function(resizer) {
			resizer();
		});
	},100);
});

'use strict';

var Countdown = function() {

};

Countdown.prototype = {

	performCountdown: function(el) {

		var self = this;

		console.log($(el).data('targetdate'));
		//var el_date = $(el).attr('data-targetdate').split('-');
		var el_timestamp = $(el).attr('data-targetdate');
		// set the date we're counting down to
		var target_date = new Date(el_timestamp*1000).getTime();

		// variables for time units
		var days, hours, minutes, seconds;

		// // get tag element
		// var countdown = document.getElementById("countdown");

		// update the tag with id "countdown" every 1 second
		setInterval(function () {

		    // find the amount of "seconds" between now and target
		    var current_date = new Date().getTime();
		    var seconds_left = (target_date - current_date) / 1000;

		    // do some time calculations
		    days = parseInt(seconds_left / 86400);
		    seconds_left = seconds_left % 86400;

		    hours = parseInt(seconds_left / 3600);
		    seconds_left = seconds_left % 3600;

		    minutes = parseInt(seconds_left / 60);
		    seconds = parseInt(seconds_left % 60);

		    $(el).find('.countdown-days').html(days);
		    $(el).find('.countdown-hours').html(hours);
		    $(el).find('.countdown-minutes').html(minutes);
		    $(el).find('.countdown-seconds').html(seconds);

		}, 1000);
	},

	init: function() {

		var self = this;

		$('.countdown').each(function(ndx, element) {

			self.performCountdown(element);

			console.log(self);
		});
	}

};

module.exports = new Countdown();

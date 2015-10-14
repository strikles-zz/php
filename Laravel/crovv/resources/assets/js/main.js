'use strict';

global.App = {

	registration:   require('./_registration'),
	countdown:    	require('./_countdown'),
	groups: 		require('./_groups'),
};


(function($) {

	$(document).ready(function() {

		global.App.registration.init();
		global.App.countdown.init();
		global.App.groups.init();

		$('.timepicker').timepicker();

		console.log(global.App.groups);
	});

})(jQuery);

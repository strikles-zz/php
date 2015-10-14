'use strict';

var angular = window.angular;
var _ = window._;

global.App = {

	promoters: {
		app: require('./app.js'),
        filters: require('./filters/index.js'),
		run: require('./config/run.js'),
		router: require('./config/router.js'),
		factories: require('./factories/index.js'),
		directives: require('./directives/index.js'),
		controllers: {
			promoters: require('./controllers/promoters.js'),
			tasks: require('./controllers/tasks.js'),
			tickets: require('./controllers/tickets.js')
		}
	},
	registration: require('./zzz/promoters_registration_app.js')
};

(function() {

    // promoters kb listener
    $(document).on('keypress', function(e) {

        if($('#promoterTickets').length !== 0) {

            var code = e.keyCode || e.which;
            console.log('kb code', code, code === 13);

            if(code === 13) {

                console.log('ppp');
                $('.save-btn').first().trigger('click');
                e.preventDefault();
                e.stopPropagation();

                return false;
            }
        }
    });

})();
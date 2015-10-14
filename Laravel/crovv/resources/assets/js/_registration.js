'use strict';

var Registration = function() {

		this.current_fs  = undefined;
		this.next_fs     = undefined;
		this.previous_fs = undefined; //fieldsets
		this.left        = undefined; 
		this.opacity     = undefined;
		this.scale       = undefined;; //fieldset properties which we will animate
		this.animating   = undefined; //flag to prevent quick multi-click glitches
};

Registration.prototype = {

	nextListener: function() {

		var self = this;

		$(".next").click(function() {

			if(self.animating) {
				return false;
			}

			self.animating = true;

			self.current_fs = $(this).closest('fieldset');
			self.next_fs = $(this).closest('fieldset').next();

			//activate next step on progressbar using the index of next_fs
			$(".progress_bar li").eq($("fieldset").index(self.next_fs)).addClass("active");

			//show the next fieldset
			self.current_fs.hide();
			self.next_fs.show();
			self.animating = false;
			//hide the current fieldset with style
			// current_fs.animate({opacity: 0}, {
			// 	step: function(now, mx) {
			// 		//as the opacity of current_fs reduces to 0 - stored in "now"
			// 		//1. scale current_fs down to 80%
			// 		scale = 1 - (1 - now) * 0.2;
			// 		//2. bring next_fs from the right(50%)
			// 		left = (now * 50)+"%";
			// 		//3. increase opacity of next_fs to 1 as it moves in
			// 		opacity = 1 - now;
			// 		current_fs.css({'transform': 'scale('+scale+')'});
			// 		next_fs.css({'left': left, 'opacity': opacity});
			// 	},
			// 	duration: 800,
			// 	complete: function(){
			// 		current_fs.hide();
			// 		animating = false;
			// 	},
			// 	//this comes from the custom easing plugin
			// 	//easing: 'easeInOutBack'
			// });
		});
	},

	prevListener: function() {

		var self = this;

		$(".previous").click(function() {

			if(self.animating) {
				var a = 1;
				return false;
			}

			self.animating = true;

			self.current_fs = $(this).closest('fieldset');
			self.previous_fs = $(this).closest('fieldset').prev();

			//de-activate current step on progressbar
			$("#progressbar li").eq($("fieldset").index(self.current_fs)).removeClass("active");

			//show the previous fieldset
			self.current_fs.hide();
			self.previous_fs.show();

			self.animating = false;

			//hide the current fieldset with style
			// current_fs.animate({opacity: 0}, {
			// 	step: function(now, mx) {
			// 		//as the opacity of current_fs reduces to 0 - stored in "now"
			// 		//1. scale previous_fs from 80% to 100%
			// 		scale = 0.8 + (1 - now) * 0.2;
			// 		//2. take current_fs to the right(50%) - from 0%
			// 		left = ((1-now) * 50)+"%";
			// 		//3. increase opacity of previous_fs to 1 as it moves in
			// 		opacity = 1 - now;
			// 		current_fs.css({'left': left});
			// 		previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			// 	},
			// 	duration: 800,
			// 	complete: function(){
			// 		current_fs.hide();
			// 		animating = false;
			// 	},
			// 	//this comes from the custom easing plugin
			// 	//easing: 'easeInOutBack'
			// });
		});		
	},

	submitListener: function() {

		var self = this;

		$(".submit").click(function(){
			return false;
		});
	},

	init: function() {

		var self = this;

		self.nextListener();
		self.prevListener();
		self.submitListener();
	}

};

module.exports = new Registration();
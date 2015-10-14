'use strict';

var Groups = function() {

};

Groups.prototype = {

	inviteUserListeners: function() {

		var self = this;

		// add remove to selected column
		$('.user-entry').click(function() {

			console.log('selected/deselected a user');

			var $el = $(this);
			//console.log('clicked');
			var $checkbox_el = $el.find('.faChkRnd');
			$checkbox_el.prop('checked', !$checkbox_el.prop('checked'));

			var r_img = $el.find('.user-img').first().html();
			var r_name = $el.find('.user-name').first().html();
			var r_value = $checkbox_el.val();
			console.log(r_img, r_name, r_value);

			// add to selected
			if($checkbox_el.is(':checked')) {

				var $tmpl_html = $( "#selectedTemplate" ).html();
				$(".invite-users-selected").append($tmpl_html);

				var $selected_el = $('.selected-entry').last();

				$selected_el.find('.selected-img').first().html(r_img);
				$selected_el.find('.selected-name').first().html(r_name);
				$selected_el.find('input[type=checkbox]').first().val(r_value).prop('checked', true);

				// remove from selected column and uncheck in invite list
				$selected_el.on('click', function() {

					console.log($selected_el);
					var $el = $(this);
					console.log($el);
					$el.remove();
					$checkbox_el.prop('checked', false);

					$('.selected-count').html("("+$('.invite-users-selected').find('.selected-entry').length+")");

				});
			}
			// remove from selected
			else {

				var $input_el = $(".invite-users-selected").find("input[type=checkbox][value="+r_value+"]").closest('.selected-entry').remove();
				//console.log($input_el);
			}

			// set counter
			$('.selected-count').html("("+$('.invite-users-selected').find('.selected-entry').length+")");
		});
	},

	init: function() {

		var self = this;
		console.log(self);
		self.inviteUserListeners();
	}
};

module.exports = new Groups();

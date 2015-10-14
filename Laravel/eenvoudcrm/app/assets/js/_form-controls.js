'use strict';

var Formcontrols = function() {
};

Formcontrols.prototype = {

	initFormControls: function($el) {

		var self = this;

		if (!$el) {
			$el = $('body');
		}
		//console.log('init form controls', $el);
		self.initDataSliders($el);
		self.initInputGroups($el);
		self.initDatePickers($el);
	},

	initDatePickers: function($el) {

		$el.find('input[date-picker]').each(function(ndx, val) {
			var $input = $(this);
			$input.datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
	},

	initInputGroups: function($el) {
		$el.find('[input-group]').each(function() {
			var $input = $(this);
			var $inputGroup = $('<div>').addClass('input-group');
			var $addon = $('<span>').addClass('input-group-addon').html($input.attr('input-group-label'));
			$input.wrap($inputGroup);
			$input.after($addon);
		});
	},

	initDataSliders: function($el) {

		$el.find('input[data-slider=true]').each(function() {

			var $input = $(this);
			var $slider = $('<div>');
			$input.after($slider);

			var min = parseInt($input.attr('data-slider-min'), 10) || 0;
			var max = parseInt($input.attr('data-slider-max'), 10) || 100;
			var step = parseInt($input.attr('data-slider-step')) || 1;
			var value = parseInt($input.val()) || min;

			$slider.slider({
				value: value,
				min: min,
				max: max,
				step: step,
				slide: function( event, ui ) {
					$input.val(ui.value);
	  			}
			});

			var calculateCorrectValue = function(value) {

				if (value > max) {
					value = max;
				}
				if (value < min) {
					value = min;
				}
				if (value > 0) {
					value = Math.ceil(value / step) * step;
				}
				if (value < 0) {
					value = Math.floor(value / step) * step;
				}
				return value;
			};

			var setValues = function() {

				var value = calculateCorrectValue($input.val());
				$input.val(value);
				$slider.slider({
					value: value
				});
			};

			setValues();

			$input.on('change', function() {
				setValues();
			});
		});
	}
};

module.exports = new Formcontrols();


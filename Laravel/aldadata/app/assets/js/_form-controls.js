'use strict';

var FormControls = function() {

};

FormControls.prototype = {

    initFormControls: function($el) {

        var self = this;

        if (!$el) {
            $el = $('body');
        }

        $.datepicker.setDefaults({
            //showOn: "both",
            buttonImageOnly: true,
            formatDate: "yy-mm-dd"
            //buttonImage: "calendar.gif",
            //buttonText: "Calendar"

        });

        self.initDataSliders($el);
        self.initInputGroups($el);
        self.initDatePickers($el);
        self.initTimePickers($el);
        self.initKeyboardShortcuts($el);
    },

    initKeyboardShortcuts: function($el) {

        // On cursor down and up key, go to next or previous legend
        $el.find('.col-sm-7 input[type="text"]').on('keyup', function(e) {

            var $legends           = $el.find('.col-sm-7 legend'); // all legends in left column
            var $currentLegend     = $(this).parents('.form-group:first').prevAll().filter('legend:first');
            var currentLegendIndex = $legends.filter($currentLegend).index('legend');
            var legendCount        = $legends.length;

            if (e.keyCode === 40) { // DOWN key
                if (currentLegendIndex < legendCount - 1) {
                    $legends.eq(currentLegendIndex + 1).nextAll('.form-group:first').find('.form-control:first').focus();
                }
            }

            if (e.keyCode === 38) { // UP key
                if (currentLegendIndex > 0) {
                    $legends.eq(currentLegendIndex - 1).nextAll('.form-group:first').find('.form-control:first').focus();
                }
            }
        });
    },

    initTimePickers: function($el) {

        $el.find('input[time-picker]').each(function(ndx, val) {

            var $input = $(this);
            $input.timepicker({
                controlType: 'select',
                timeFormat: 'HH:mm',
                stepMinute: 5
            });
        });
    },

    initDatePickers: function($el) {

        $el.find('input[date-picker]').each(function(ndx, val) {

            var $input = $(this);
            var options = {dateFormat: 'yy-mm-dd'};

            $input.datepicker(options);
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
            var forceStepOnInput = $input.attr('data-slider-force-input-step') ? true : false;
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

            var calculateCorrectValue = function(value, forceStep) {

                if (value > max) {
                    value = max;
                }
                if (value < min) {
                    value = min;
                }

                if (forceStep) {
                    if (value > 0) {
                        value = Math.ceil(value / step) * step;
                    }
                    if (value < 0) {
                        value = Math.floor(value / step) * step;
                    }
                }

                return value;
            };

            var setValues = function() {
                var value = $input.val();
                $input.val(calculateCorrectValue(value, forceStepOnInput));
                $slider.slider({
                    value: calculateCorrectValue(value, true)
                });
            };

            setValues();

            $input.on('change', function() {
                setValues();
            });
        });
    }

};

module.exports = new FormControls();

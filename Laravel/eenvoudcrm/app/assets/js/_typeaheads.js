'use strict';

var _ = window._,
Bloodhound = window.Bloodhound;

var TypeAheads = function() {

};

TypeAheads.prototype = {

	init: function($el) {

		if (!$el) {
			$el = $('body');
		}

		$el.find('input.typeahead').not('.initialized').each(function() {

			var $input 					= $(this);
			var $addNewButton 			= $input.parents('.input-group:first').find('.input-group-btn button');
			var url 					= '/api/v1' + $input.attr('data-prefetch-url');
			var attachBaseUrl 			= $input.attr('data-attach-url');

			var $suggestionTemplate 	= $el.find('#' + $input.attr('data-template-id')).html() || '<%= datum.value %>';
			var suggestionTemplate 		= _.template($suggestionTemplate);

			//console.log('initializing typeAhead: ', $input);

			// Disable addNewButton, it will be enabled at on change event, when there are at least 3 characters
			if ($addNewButton) {
				$addNewButton.attr('disabled', 'disabled');
			}

			// Prevent inputs from initializing multiple times
			$input.addClass('initialized');

			// Construct Bloodhound suggestion engine, we don't use the prefetch featured
			var bloodhound = new Bloodhound({
				datumTokenizer: function(d) {
					return Bloodhound.tokenizers.whitespace(d.value);
				},
				queryTokenizer: function(query) {
					return Bloodhound.tokenizers.whitespace(query);
				},
				dupDetector: function(remoteMatch, localMatch) {
					return remoteMatch.id === localMatch.id;
				},

				limit: 10,

				remote: {
					url: url + '?q=%QUERY'
				}

			});

			//bloodhound.clearPrefetchCache(); bloodhound.clearRemoteCache();
			bloodhound.initialize();
			//bloodhound.clearPrefetchCache(); bloodhound.clearRemoteCache();


			// Construct the Twitter Typeahead itself
			$input.typeahead(
			{
	        	hint: true,
	        	highlight: true,

	       	},
	       	{
				limit: 10,
				source: bloodhound.ttAdapter(),
	        	restrictInputToDatum: true,
	        	templates: {
	        		header: function(datum) {
	        			return '<div class="list-group typeahead-results-container">';
	        		},
	        		footer: function(datum) {
	        			return '</div>';
	        		},
	        		suggestion: function(datum) {

	        			var $link = $('<a href="#" class="list-group-item" data-id="' + datum.id + '">' + suggestionTemplate({datum : datum}) + '</a>');

	        			// Add typeahead to begin of DOM to be able to do styling (cannot inspect elements, because the focus out clears the elements)
	        			// if (0) {

	        			// 	$link.on('click', function(e) {
		        		// 		e.preventDefault();
		        		// 		$(this).parent().parent().parent().parent().parent().clone().prependTo('body');
		        		// 		return true;
		        		// 	});
	        			// }

	        			return $link;
	        		}
	        	}
			})

			// When using the keyboard to walk through the suggestions, add bootstrap classes for visual enhancements
			.on('typeahead:cursorchanged', function(event, suggestion, dataset) {

				$('.tt-suggestion a').removeClass('active');
				$('.tt-suggestion.tt-cursor a').addClass('active');

			})

			// Enable addNewButton if at least 3 characters are present in the input box
			.on('keyup', function() {

				if ($addNewButton) {

					if ($(this).val().length > 2) {
						$addNewButton.removeAttr('disabled');
					} else {
						$addNewButton.attr('disabled', 'disabled');
					}

				}
			});

			// Add classes for styling purposes
			$input.parent('.twitter-typeahead').addClass('row-fluid block').find('.tt-dropdown-menu').css({display: 'block'});

		});
	}
};

module.exports = new TypeAheads();



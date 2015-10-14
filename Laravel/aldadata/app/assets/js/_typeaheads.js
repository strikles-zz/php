'use strict';

var TypeAheads = function() {

};

TypeAheads.prototype = {

    init: function($el) {

        var _ = window._;
        var Bloodhound = window.Bloodhound;

        if (!$el) {
            $el = $('body');
        }

        $el.find('input.typeahead').not('.initialized').each(function() {

            var $input              = $(this);
            var $addNewButton       = $input.parents('.input-group:first').find('.input-group-btn button');
            var murl                = '/api/v1' + $input.attr('data-prefetch-url');
            var attachBaseUrl       = $input.attr('data-attach-url');
            var $suggestionTemplate = $el.find('#' + $input.attr('data-template-id')).html() || '<%= datum.value %>';
            var suggestionTemplate  = _.template($suggestionTemplate);

            console.log('suggestion template', $suggestionTemplate);

            // This is used for the search pages, combining the type-ahead features with the tag input stuff. Instead of
            // attaching this model to the parent model via attachBaseUrl
            var tagInput = ($input.attr('data-role') === 'tagsinput' ? true : false);
            console.log('is tagInput: ', $input.attr('data-role'), tagInput);

            // Disable addNewButton, it will be enabled at on change event, when there are at least 3 characters
            if ($addNewButton) {
                $addNewButton.attr('disabled', 'disabled');
            }

            // Prevent inputs from initializing multiple times
            $input.addClass('initialized');

            // Construct Bloodhound suggestion engine, we don't use the prefetch featured
            var bloodhound = new Bloodhound(
            {
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
                    url: murl + '?q=%QUERY',
                    wildcard: '%QUERY'
                }
            });

            //bloodhound.clearPrefetchCache(); bloodhound.clearRemoteCache();
            bloodhound.initialize();
            //bloodhound.clearPrefetchCache(); bloodhound.clearRemoteCache();

            //console.log('ta Bloodhound', bloodhound.ttAdapter());

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

                        // Add typeahead to begin of DOM to be able to do styling
                        // (cannot inspect elements, because the focus out clears the elements)
                        if (0) {
                            $link.on('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                $(this).parent().parent().parent().parent().parent().clone().prependTo('body');
                                return true;
                            });
                        }

                        console.log('$link', $link, datum);

                        return $link;
                    }
                }
            })

            // When using the keyboard to walk through the suggestions, add bootstrap classes for visual enhancements
            .on('typeahead:cursorchanged', function(event, suggestion, dataset) {

                console.log('typeahead:cursorchanged', $(this), event, suggestion, dataset);

                if(suggestion) {
                    $(this).val(suggestion.value);
                }

                $('.tt-suggestion a').removeClass('active');
                $('.tt-suggestion.tt-cursor a').addClass('active');

            })

            // When an item is selected from the list
            .on('typeahead:selected', function(event, suggestion, dataset) {

                // attach this item to the parent item
                if (attachBaseUrl) {

                    var attachUrl = attachBaseUrl + '/' + suggestion.id + '/attach';

                    $.ajax({
                        url: attachUrl,
                        method: 'POST',

                        success: function(data) {

                            if (data.success) {
                                // reset input fields
                                $('.typeahead').typeahead('val', '');
                                console.log('typeahead:selected related model attached :)', data);

                            } else if (data.error) {
                                alert(data.error);
                            }

                            if (data.reload && global.App.ajax.pages.length) {
                                global.App.ajax.pages[global.App.ajax.pages.length - 1].refresh();
                            }

                        }
                    });

                }

                // search countries
                else if (tagInput) {

                    console.log(suggestion);

                    var $sel = $(this).closest('.form-group').find('input.form-control:first');
                    $('.typeahead').typeahead('val', '');
                    $sel.tagsinput('add', suggestion.value);

                    return false;
                }

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
            var $target_el = $input.parent('.twitter-typeahead').addClass('row-fluid block').find('.tt-menu');
            $target_el.css({display: 'block'});

            console.log('tagsinput $target_el', $target_el.length, $target_el);
        });
    }
};

module.exports = new TypeAheads();

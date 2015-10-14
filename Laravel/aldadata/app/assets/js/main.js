'use strict';

var _ = window._;

global.App = {

    resizer: require('./_resize'),
    ajax: require('./_ajax'),
    debug: require('./_debug'),

    FormControls: require('./_form-controls'),
    typeAheads: require('./_typeaheads'),

    searchbuild: require('./_search'),
    search: {},

    functions: {

        getPage: function($el, iframe) {

            console.log('running globl.App.functions.getPage', $el, iframe);

            var args = {
                type:           $el.attr('data-type'),
                id:             $el.attr('data-id') || $el.parents('form:first').find('input#id').val(),
                action:         $el.attr('data-action'),
                parentID:       $el.attr('data-parent-id'),
                parentType:     $el.attr('data-parent-type'),
                parentTitle:    $el.attr('data-parent-title'),
                input:          $el.parents('.input-group:first').length ? $el.parents('.input-group:first').find('input:first').val() : false
            };

            console.log('attributes', args);

            global.App.ajax.get(

                $.extend(true, args, {

                    success: function(data) {

                        if (iframe) {

                            $('iframe').contents().find('div.content:last').slideUp().after(data);

                        } else {

                            $('div.content:last').slideUp().after(data);

                            var e = jQuery.Event( "ajaxContentAdded", { data: data } );
                            console.log('firing: ajaxContentAdded');
                            $(window).trigger(e);
                            console.log('fired: ajaxContentAdded');
                        }

                    }
                })
            );
        }
    }
};

// ???
//require('./_alerts');


(function($) {

    $(document).ready(function() {

        //global.App.debug.init();

        // create / edit buttons
        $('body').on('click', '.iframe', function(e) {

            console.log('clicked .iframe');
            e.preventDefault();
            var $el = $(this);

            $el.colorbox({
                html: '<div class="content"></div>',
                width:"90%",
                height:"90%",
                fastIframe: false,
                trapFocus: false,

                onComplete: function(a,b,c) {
                    global.App.functions.getPage($el);
                },

                onCleanup: function() {

                    for (var i = global.App.ajax.pages.length - 1; i >= 0; i--) {
                        global.App.ajax.pages[i].close();
                    }

                }
            });

        });

        // delete modals
        $('body').on('click', '.modal-popup', function(e) {

            console.log('clicked .modal-popup');

            e.stopPropagation();
            e.preventDefault();

            var href   = $(this).attr('href') || $(this).attr('data-action');
            var $modal = $('#ajax-modal');

            console.log('clicked .modal-popup');

            $modal.load(href, '', function(){

                $modal.modal();
                $modal.css(
                {
                    'max-width': '50%',
                    'left': function () {
                        return ($(window).width()/2) - ($modal.width()/2);
                    },
                    'top': function() {
                        return ($(window).height()/2) - 90;
                    }
                });

                $modal.find('form').on('submit', function(e) {

                    e.preventDefault();
                    var $form = $(this);

                    $.ajax({
                        method: $form.attr('method'),
                        url: $form.attr('action'),
                        data: $form.serialize(),

                        success:function(data) {

                            console.log("Am I running 2 ?");
                            if (data.success && data.reload === true) {

                                if (global.App.ajax.pages.length) {
                                    global.App.ajax.pages[global.App.ajax.pages.length - 1].refresh();
                                } else if (window.oTable) {
                                    // Reload parent Otable
                                    window.oTable.dataTable().api().ajax.reload(null, false);
                                } else {
                                    location.reload();
                                }

                                $modal.find('button.btn-default').click();

                            } else if (data.error) {
                                alert(data.error);
                            }
                        }
                    });
                });
            });
        });
    });

    // $(window).on('ngModalOpen', function() {

    //     console.log('>>> Open');
    //     $('.modal-dialog').css({
    //         'max-width': '40%',
    //         'top': function() {
    //             var top_offset = ($(window).height()/2) - 210;
    //             console.log(top_offset);
    //             return top_offset;
    //         }
    //     });
    // });

    // dropzone for ajax pages
    $(window).on('ajaxContentAdded', function() {

        if(!$('#venues_image_upload').length)
        {
            console.log('could not find images element');
            return false;
        }

        var form_action = $('#venues_image_upload').attr('action');
        var Dropzone = new window.Dropzone('#venues_image_upload', {
            url: form_action,
            accept: function (file, done) {

                if ((file.type).toLowerCase() !== "image/jpg" &&
                    (file.type).toLowerCase() !== "image/gif" &&
                    (file.type).toLowerCase() !== "image/jpeg" &&
                    (file.type).toLowerCase() !== "image/png")
                {
                   done("Invalid file");
                }
                else {
                    done();
                }
            },
            init: function() {

                this.on("addedfile", function(file) {
                    //console.log("Added file.");
                    global.App.ajax.pages[global.App.ajax.pages.length - 1].refresh();
                });
            }
        });

        // colorbox for displaying images
        $('a.mthumbs').volorbox({
            rel:'mthumb',
            title: function(){
                var caption = $(this).attr('data-caption');
                return caption;
            },
            maxWidth: "90%",
            maxHeight: "90%"
        });
    });

    $(document).ready(function() {

        if (!$('#search-container').length) {
            return false;
        }

        console.log(':|');

        global.App.search.companies = $.extend(true, {}, global.App.searchbuild);
        global.App.search.companies.init({name : 'companies'});

        global.App.search.venues = $.extend(true, {}, global.App.searchbuild);
        global.App.search.venues.init({name : 'venues'});

        global.App.search.contacts = $.extend(true, {}, global.App.searchbuild);
        global.App.search.contacts.init({name : 'contacts'});

        var $typeAheads = $('body').find('input.typeahead.form-control').next('.bootstrap-tagsinput').find('input:first');
        $.each($typeAheads, function() {

            var $input = $(this);
            var $parent = $input.closest('.form-group').find('input.typeahead');

            $input.attr('data-prefetch-url', $parent.attr('data-prefetch-url'));
            $input.attr('data-template-id', $parent.attr('data-template-id'));
            $input.attr('data-role', $parent.attr('data-role'));
            $input.addClass('typeahead');
            $parent.removeClass('typeahead');

            global.App.typeAheads.init($input.parent());
        });
    });

    // resize all the things on resize
    $(window).resize(function() {

        var $modal = $('#ajax-modal');
        $modal.css(
        {
            'max-width': '50%',
            'left': function () {
                return ($(window).width()/2) - ($modal.width()/2);
            },
            'top': function() {
                return ($(window).height()/2) - 90;
            }
        });

        console.log('Valid resize ???', ($(window).height()/2) - 210);
        $('.modal-content').css({
            top: function() {
                return ($(window).height()/2) - 210;
            }
        });

        global.App.resizer.resizeColorBoxes();
    });
    //global.App.resizer.resizeColorBoxes();

})(jQuery);



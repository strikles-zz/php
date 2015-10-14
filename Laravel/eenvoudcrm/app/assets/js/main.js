'use strict';

//var App = window.App = window.App || {};
global.App = {

    resizer:    require('./_resize'),
    ajax:       require('./_ajax'),
    debug:      require('./_debug'),
    modal:      require('./_modal'),
    form:       require('./_form-controls'),
    typeahead:  require('./_typeaheads'),

    functions: {

        // ajax stuff
        getPage: function($el, iframe) {

            var ajax = global.App.ajax;
            var args = {
                auth:           $el.attr('data-auth'),
                type:           $el.attr('data-type'),
                id:             $el.attr('data-id') || $el.parents('form:first').find('input#id').val(),
                action:         $el.attr('data-action'),
                parentID:       $el.attr('data-parent-id'),
                parentType:     $el.attr('data-parent-type'),
                parentTitle:    $el.attr('data-parent-title')
            };

            ajax.get(

                $.extend(true, args, {

                    success: function(data) {

                        console.log('getPage OK ', $(data).contents());

                        if (iframe) {

                            $('iframe').contents().find('div.content:last').slideUp().after(data);
                            console.log('iframe content', $('iframe').contents().find('div.content:last'));

                        } else {

                            //$('#colorbox, div.content:last').css("opacity", 0);
                            //$('div.content:last').slideUp().after(data);
                            $('div.content:last').hide().after(data);
                            //$('#colorbox').animate({"opacity": 1}, 350);

                            var e = jQuery.Event( "ajaxContentAdded", { "data": data } );
                            console.log('firing: ajaxContentAdded');
                            $(window).trigger(e);
                            console.log('fired: ajaxContentAdded');
                        }
                    }
                })
            );
            console.log(args);
        }
    },

    helpers: {

        projects:           require('./helpers/_projects'),
        services:           require('./helpers/_services'),
        strippenkaarten:    require('./helpers/_strippenkaarten'),
        subscriptions:      require('./helpers/_subscriptions'),
        worklogs:           require('./helpers/_worklogs')
    },
    // Require all necessary views
    views: {

        Dt:                 require('./views/_dt'),
        DtAccounting:       require('./views/_accounting'),
        DtCompanies:        require('./views/_companies'),
        DtDashboard:        require('./views/_dashboard'),
        DtProjects:         require('./views/_projects'),
        DtSettings:         require('./views/_settings'),
        DtWorklogs:         require('./views/_worklogs'),
        DtSubscriptions:    require('./views/_subscriptions'),
        DtStrippenkaarten:  require('./views/_strippenkaarten'),
        Hosting:            require('./views/_hosting'),
        Reporting:          require('./views/_reporting')
    },
    //Quill: window.Quill,
    //TableTools: window.TableTools,

};

(function($) {

    // Init helpers
    global.App.helpers.projects.init();
    global.App.helpers.services.init();
    global.App.helpers.strippenkaarten.init();
    global.App.helpers.subscriptions.init();
    global.App.helpers.worklogs.init();

    $(document).ready(function(e) {

        global.App.views.DtWorklogs.document_ready_cb();
        global.App.views.DtSubscriptions.document_ready_cb();
        global.App.views.DtStrippenkaarten.document_ready_cb();
        global.App.views.DtSettings.document_ready_cb();
        global.App.views.DtProjects.document_ready_cb();
        global.App.views.DtDashboard.document_ready_cb();
        global.App.views.DtAccounting.document_ready_cb();
        global.App.views.Reporting.document_ready_cb();

    });

    $(window).on('ajaxPageLoaded', function(e) {

        global.App.views.DtWorklogs.ajax_pageloaded_cb(e);
        global.App.views.DtSubscriptions.ajax_pageloaded_cb(e);
        global.App.views.DtStrippenkaarten.ajax_pageloaded_cb(e);
        //global.App.views.DtSettings.ajax_pageloaded_cb(e);
        global.App.views.DtProjects.ajax_pageloaded_cb(e);
        //global.App.views.DtDashboard.ajax_pageloaded_cb(e);
        global.App.views.DtAccounting.ajax_pageloaded_cb(e);
        global.App.views.Hosting.ajax_pageloaded_cb(e);
        global.App.views.Reporting.ajax_pageloaded_cb(e);

    });

    $(window).on('ajaxContentAdded', function(e) {

        global.App.views.Hosting.ajax_contentadded_cb(e);

    });

    $("body").on("click", "ul.nav-tabs a", function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('body').on('click', '.iframe', function(e) {

        e.preventDefault();
        var $el = $(this);
        $el.colorbox({
            html: '<div class="content"></div>',
            width:"90%",
            height:"90%",
            trapFocus: false,
            fastIframe: false,
            transition: "none",
            opacity: 0.77,

            onOpen: function() {

                $('#colorbox, #cboxLoadedContent').css("opacity", 0);
            },

            onComplete: function(a,b,c) {

                global.App.functions.getPage($el);
                $('#colorbox, #cboxLoadedContent').css("opacity", 1);
                //$('#colorbox, div.content:last').css("opacity", 0);
            },
            onCleanup: function() {

                for (var i = global.App.ajax.pages.length - 1; i >= 0; i--) {
                    global.App.ajax.pages[i].close();
                }
            }
        });
    });

    $('body').on('click', '.ajax', function(e) {

        e.preventDefault();
        console.log('ajax this', $(this));
        global.App.functions.getPage($(this));

    });

    global.App.resizer.resizeColorBoxes();

})(jQuery);

$(window).resize(global.App.resizer.resizeColorBoxes);

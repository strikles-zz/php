'use strict';

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();

    $.each(a, function() {

        if (o[this.name] !== undefined) {

            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');

        } else {
            o[this.name] = this.value || '';
        }
    });

    return o;
};

var AjaxPage = function(ajax, options) {

    $.extend(true, this, options);

    this.ajax  = ajax;
    this.child = undefined;

    this.typeaheads = require('./_typeaheads');
    this.formcontrols = require('./_form-controls');
    this.init();

    return this;
};

AjaxPage.prototype = {

    init: function() {

        var self = this;

        self.$form = self.$el.find('form');

        self.setTitle();
        self.hookEvents();
        self.toggleAddOtherModels();
        self.toggleCloseButtons();

        // init self controls
        self.formcontrols.initFormControls(self.$el);
        self.typeaheads.init(self.$el);

         console.log('AjaxPage init', self);
    },

    hookEvents: function() {

        var self = this;

        // Find form and disable default action (otherwise whole iframe is reloaded)
        self.$form.one('submit', function(e) {
            e.stopPropagation();
            e.preventDefault();
            self.submit();
        });

        // close
        self.$el.find('button.close-ajax-page').one('click', function(e) {

            //console.log('closing page');
            e.preventDefault();
            var $button = $(this);

            $.each(self.ajax.pages, function(index, page) {

                if (page.$el.find('button.close-ajax-page')[0] === $button[0]) {
                    if (index === self.ajax.pages.length - 1) {
                        // dit is de laatste pagina
                        page.close();
                    } else {
                        console.log('page length', self.ajax.pages.length);
                        alert('Sluit eerst de onderliggende pagina\'s');
                    }
                }
            });
        });
    },

    setTitle: function() {

        var self = this;
        var $title = self.$el.find('.page-header h3');
        $title.html($title.html() + ' <small>(to ' + self.parentTitle + ')</small>');
    },

    toggleAddOtherModels: function() {

        var self = this;
        if (self.modelID === 0) { // this is a new model, we are not in editing mode
            self.$el.find('.related-models-container').remove();
        }
    },

    toggleCloseButtons: function() {

        var self = this;
        var $closeButtons = $('body').add(self.$el).find('button.close_popup, button.close-ajax-page');

        $closeButtons.attr('disabled', 'disabled');
        $closeButtons.filter(':last').removeAttr('disabled');
    },

    close: function() {

        var self = this;

        console.log('AjaxPage Close');

        // find if current page is the top page
        // if not find the previous page to slideDown
        var $previousPage = false;
        var isTopPage     = false;

        if (self.ajax.pages.length > 1) {
            $previousPage = self.ajax.pages[self.ajax.pages.length - 2].$el.find('.content');
        } else {
            $previousPage = $('.content:first');
            isTopPage     = true;
        }

        // it's not the top page
        if (!isTopPage) {

            self.ajax.pages[self.ajax.pages.length - 2].refresh();
            self.$el.slideUp(function() {

                $(this).remove();
                self.$el.empty();
            });

            $previousPage.slideDown();

        // it is so we reload the datatable
        } else {

            if (typeof window.oTable !== 'undefined') {
                window.oTable.dataTable().api().ajax.reload(null, false);
            }

            // Close colorbox
            //self.ajax.pages.pop();
            $.colorbox.close();
        }

        // pop last page
        self.ajax.pages.pop();

        // self-destroy
        self = undefined;
    },

    submit: function() {

        var self = this;

        $('.backdrop').css('display', 'block');

        var post_data = {},
        tmp_form_data      = self.$form.serializeObject();
        var num_ajax_pages = self.ajax.pages.length;

        if(num_ajax_pages > 0 && self.ajax.pages[num_ajax_pages - 1].hasOwnProperty('parentID'))
        {
            $.extend(true, post_data, {
                    parent_model: self.ajax.pages[num_ajax_pages - 1].parentType,
                    parent_id: self.ajax.pages[num_ajax_pages - 1].parentID,
                    child_model: self.ajax.pages[num_ajax_pages - 1].modelType,
                    child_id: self.ajax.pages[num_ajax_pages - 1].modelID
            });
        }

        $.extend(true, post_data, tmp_form_data);
        console.log('AjaxPage Submit', post_data, tmp_form_data);

        self.ajax.post({
            data:       post_data,
            page:       self,

            success: function(html) {

                console.log('pages', global.App.ajax.pages, html);

                self.$el.empty();
                self.url     = $(html).attr('data-url');
                self.modelID = $(html).attr('data-id');
                self.$el.html($(html).contents());
                self.init();

                window.oTable.api().ajax.reload(null, false);

                console.log("Am I running ?");
                $('.backdrop').css('display', 'none');
            }
        });
    },

    refresh: function() {

        var self = this;

        console.log('AjaxPage Refresh');

        $.ajax({
            method: 'GET',
            url: self.url,
            success: function(html) {

                self.$el.empty();
                self.$el.html($(html).contents());
                self.init();

                var e = jQuery.Event( "ajaxContentAdded", { data: html } );
                $(window).trigger(e);
            }
        });
    }
};

var Ajax = function(options) {

    var defaults = {
        method: 'GET',
        data: {
        }
    };

    this.defaults         = $.extend(true, {}, defaults, options);
    this.pages            = [];
    this.currentPageIndex = undefined;
};

Ajax.prototype = {

    post: function(options) {

        var url = options.page.url;
        console.log('Ajax post', url, options);

        $.ajax({
            url: url,
            method: 'POST',
            data: options.data,

            success:function(data, textStatus, jqXHR) {

                if (options.success && typeof options.success === 'function') {
                    options.success(data);
                    console.log('Ajax post response', data);
                }
            }
        });
    },

    get: function(options) {

        var self = this;
        $.extend(true, options, self.defaults, options);
        var url = '/';

        if(options.type === 'tickettypes') {

            console.log('ticketype', options);
            switch (options.action) {
                case 'edit':
                    url += options.parentType.toLowerCase() + '/' + options.parentID + '/' + options.type + '/' + options.id + '/' + options.action;
                    break;
                case 'create':
                    url += options.parentType.toLowerCase() + '/' + options.parentID + '/' + options.type + '/' + options.action;
                    break;
            }

        } else {

            switch (options.action) {
                case 'edit':
                    url += options.type + '/' + options.id + '/' + options.action;
                    break;
                case 'create':
                    url += options.type + '/' + options.action;
                    break;
            }
        }

        if (options.parentID) {
            options.data.parentID = options.parentID;
        }

        console.log('Ajax get', url);

        $.ajax({
            url: url,
            method: options.method,
            data: options.data,

            success:function(data, textStatus, jqXHR) {

                var page = new AjaxPage(self, {
                    $el:            $(data),
                    url:            url,
                    modelID:        options.id || 0,
                    modelType:      options.type,
                    parentID:       options.parentID,
                    parentType:     options.parentType,
                    parentTitle:    options.parentTitle
                });

                console.log('Ajax got page :)', page);

                // set parent id on form
                var $parentField = page.$el.find('form input[name=' + [page.parentType] + '_id]');
                if ($parentField.length && !$parentField.val()) {
                    $parentField.val(page.parentID);
                }

                // inline summary buttons
                page.$el.on('click', '.ajax', function(e) {

                    e.preventDefault();
                    e.stopPropagation();

                    console.log('clicked .ajax');
                    global.App.functions.getPage($(this));
                });

                // These guys still have to go in a treelike structure (or not)
                self.pages.push(page);
                if (options.success && typeof options.success === 'function') {
                    options.success(page.$el);
                }
            }
        });
    }
};

module.exports = new Ajax();



'use strict';

var AjaxPage = function(ajax, options) {

	$.extend(true, this, options);

	this.ajax = ajax;
	this.child = undefined;
	this.init();

	return this;
};

AjaxPage.prototype = {

	init: function() {

		var self = this;

		self.$form = self.$el.find('form');

		// Find form en disable default action (otherwise whole iframe is reloaded)
		self.setTitle();
		self.hookEvents();
		self.toggleAddOtherModels();
		self.toggleCloseButtons();

		//console.log('Grr', global.App);
		global.App.form.initFormControls(self.$el);
		global.App.typeahead.init(self.$el);
	},

	hookEvents: function() {

		var self = this;

		self.$form.one('submit', function(e) {
			e.preventDefault();
			self.submit();
		});

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
						alert('Sluit eerst de onderliggende pagina\'s');
					}
				}
			});
		});
	},

	setTitle: function() {

		var self = this;

		var $title = self.$el.find('.page-header h3');
		//$title.html($title.html() + ' <small>(to ' + self.parentTitle + ')</small>');
	},

	toggleAddOtherModels: function() {

		var self = this;

		//console.log(self);
		if (self.modelID === 0) { // this is a new model, we are not in editing mode
			self.$el.find('.related-models-container').remove();
		}
	},

	toggleCloseButtons: function() {

		var self = this;

		var $closeButtons = $('body').add(self.$el).find('button.close_popup, button.close-ajax-page');
		//$closeButtons.attr('disabled', 'disabled');
		//console.log($closeButtons);
		//$closeButtons.filter(':last').removeAttr('disabled');
	},

	close: function() {

		var self = this;

		var $previousPage = false;
		var isTopPage     = false;

		if (self.ajax.pages.length > 1) {
			$previousPage = self.ajax.pages[self.ajax.pages.length - 2].$el.find('.content');
		} else {
			$previousPage = $('.content:first');
			isTopPage = true;
		}

		//console.log('page', $previousPage);
		if (!isTopPage) {

			self.ajax.pages[self.ajax.pages.length - 2].refresh();
			self.$el.slideUp(function() {

				$(this).remove();
				self.$el.empty();
				//self.toggleCloseButtons();
				self.ajax.pages.pop();
				self = undefined;
			});
			$previousPage.slideDown();

		} else {

			if (window.oTable) {
				//oTable.fnReloadAjax();
				//$(oTable).DataTable().ajax.reload(null, false);
				window.oTable.dataTable().api().ajax.reload(null, false);
			}

			// Close colorbox
			self.ajax.pages.pop();
			$.colorbox.close();
		}

	},

	submit: function() {

		var self = this;

		self.ajax.post({
			data:		self.$form.serialize(),
			page: 		self,

			success: function(html) {
				self.$el.empty();
				self.url = $(html).attr('data-url');
				self.modelID = $(html).attr('data-id');
				self.$el.html($(html).contents());
				self.init();
			}
		});
		//console.log(self);
	},

	refresh: function() {

		//console.log('refreshing');
		var self = this;

		//console.log(self.url);
		$.ajax({
			method: 'GET',
			url: self.url,
			success: function(html) {
				self.$el.empty();
				self.$el.html($(html).contents());
				self.init();
			}
		});

		//console.log(self);
	}
};

var Ajax = function(options) {

	var defaults = {
		method: 'GET',
		data: {
		}
	};

	this.defaults = $.extend(true, {}, defaults, options);

	this.Page 				= AjaxPage;
	this.pages 				= [];
	this.currentPageIndex 	= undefined;
};

Ajax.prototype = {

	post: function(options) {
		var url = options.page.url;

		$.ajax({
			url: url,
			method: 'POST',
			data: options.data,

			success:function(data, textStatus, jqXHR) {

				if (options.success && typeof options.success === 'function') {

					options.success(data);
				}
			}
		});
	},

	get: function(options) {

		var self = this;

		$.extend(true, options, self.defaults, options);

		var url = (options.auth === "true" ? '/admin/' : '/');
		switch (options.action) {
			case 'edit':
				url += options.type + '/' + options.id + '/' + options.action;
				break;
			case 'delete':
				url += options.type + '/' + options.id + '/' + options.action;
				break;
			case 'show':
				url += options.type + '/' + options.id + '/' + options.action;
				break;
			case 'create':
				url += options.type + '/' + options.action;
				break;
		}

		if (options.parentID) {
			options.data.parentID = options.parentID;
		}

		$.ajax({
			url: url,
			method: options.method,
			data: options.data,

			success:function(data, textStatus, jqXHR) {

				var page = new AjaxPage(self, {
					$el: 			$(data),
					url: 			url,
					modelID: 		options.id || 0,
					modelType:		options.type,
					parentID: 		options.parentID,
					parentType:		options.parentType,
					parentTitle: 	options.parentTitle
				});

				//console.log(page);

				// set parent id on form
				var $parentField = page.$el.find('form input[name=' + [page.parentType] + '_id]');
				if ($parentField.length && !$parentField.val()) {
					$parentField.val(page.parentID);
				}

				// These guys still have to go in a treelike structure (or not)
				self.pages.push(page);

				var e = jQuery.Event( "ajaxPageLoaded", { page: page } );
				$(window).trigger(e);

				if (options.success && typeof options.success === 'function') {

					options.success(page.$el);
				}
			}
		});
	}
};

module.exports = new Ajax();

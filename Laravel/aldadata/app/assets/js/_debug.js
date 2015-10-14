'use strict';

var Debugger = function() {
	var self = this;
};

Debugger.prototype = {

	init: function() {

		var self = this;
		self.createPanel();
		var $button = $('<button type="button">').text('Click me');

		$button.on('click', function() {
			console.log(global.App.ajax.pages);
		});

		$button.appendTo(self.$panel);
	},

	createPanel: function() {

		var self = this;

		var $panel = $('<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Debug</h3></div><div class="panel-body"></div></div>');
		var $panelContainer = $('<div>').css({
			position: 'absolute',
			width: 300,
			height: 400,
			bottom: 10,
			right: 10,
			"z-index": 9999
		});

		$panel.appendTo($panelContainer.appendTo($('body')));
		self.$panel = $panel.find('.panel-body');

		console.log('created panel ???');
	},

	showParentAjaxPageIDsInHeaders: function(ajaxPage) {

		var self = this;
		if (!global.App.ajax.pages.length) {
			return false;
		}

		$.each(global.App.ajax.pages, function() {
			var $html = this.$el;
			var debugString = 'id: ';
			debugString += ajaxPage.id || '';
			debugString += ', modelType: ';
			debugString += ajaxPage.modelType || '';
			debugString += ', parentID: ';
			debugString += ajaxPage.parentID || '';
			debugString += ', parentType: ';
			debugString += ajaxPage.parentType || '';
			debugString += ', parentTitle: ';
			debugString += ajaxPage.parentTitle || '';
			var $title = $html.find('.page-header h3');
			$title.html($title.html() + ' <small>' + debugString + '</small>');
			console.log('debugString', debugString);

		});
	}
};

module.exports = new Debugger();
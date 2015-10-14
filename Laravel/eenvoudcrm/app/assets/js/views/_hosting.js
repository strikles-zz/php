'use strict';

/**
 * [Hosting - constructor]
 */
var Hosting = function() {

	this.$content    = {};
	this.content_id  = "";
	this.content_txt = "";
	this.page        = {};
	this.ed          = undefined;
	this.company_id  = -1;
};

Hosting.prototype = {

	/**
	 * [init - initialize event listeners (save/reload)]
	 * @return {[type]} [description]
	 */
	init: function() {

		var self = this;

		$('body').on('click', '.ql-save', function(event){

			event.preventDefault();
			self.ajaxSave();
		});

		$('body').on('click', '.ql-reload', function(event){

			event.preventDefault();
			self.ajaxLoad();
		});

	},
	/**
	 * [populateEditor - create editor and set content]
	 * @param  {[type]} data [description]
	 * @return {[type]}      [description]
	 */
	populateEditor: function(data)
	{
		var self = this;
		if(self.ed) {
			self.ed.destroy();
			self.ed = undefined;
		}
		if(!self.ed) {
			//self.ed.destroy();
			self.ed = new window.Quill('#full-editor', {
	  			modules: {
	  				'toolbar': { container: '#full-toolbar' },
	  				'multi-cursor': true,
	  				'link-tooltip': true
	  			},
	  			theme: 'snow'
		  	});
		}

		self.ed.setHTML(data);
	},
	/**
	 * [ajaxSave - save ajax hosting content]
	 * @return {[type]} [description]
	 */
	ajaxSave: function() {

		var self = this;

		var editor_content = self.ed.getHTML();
		$.post("/admin/companies/"+self.company_id+"/hosting/data",
			{content: editor_content}, 				// data
			function(data, textStatus, xhr) {		// cb clojure
				self.ajaxLoad();
			}
		);
	},
	/**
	 * [ajaxLoad - get ajax hosting content]
	 * @return {[type]} [description]
	 */
	ajaxLoad: function() {

		var self = this;

		$.ajax({
	    	url: "/admin/companies/"+self.company_id+"/hosting/data",
	    	type: 'GET',
	    	dataType: 'json',
		    success: function(data) {

				self.content_txt = data;
				self.populateEditor(data);

		    },
		    error: function(event, xhr, settings, thrownError) {

		    	console.log(xhr, thrownError);
		    }
	    });
	},
	/**
	 * [ajax_pageloaded_cb - callback]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	ajax_pageloaded_cb: function(e) {

		var self = this;
		self.page = e.page;
		if(self.page.modelType === 'companies')
		{
			self.company_id = self.page.modelID;
			self.$content   = self.page.$el.find('#company_hosting_content');
			self.content_id = self.$content.attr('id');
			console.log('ajaxPageLoaded', self.$content.attr('id'), self.company_id, self.page);
		}

	},
	/**
	 * [ajax_contentadded_cb - callback]
	 * @param  {[type]} e [description]
	 * @return {[type]}   [description]
	 */
	ajax_contentadded_cb: function(e) {

		var self = this;
		if(self.page.modelType === 'companies')
		{
			self.init();
			self.ajaxLoad();
		}
	}
};

module.exports = new Hosting();

(function($) {

	// comment for debugging;
	var console = undefined;

	console && console.log('admin_enqueue_js.js is loaded');
	// Come from vc_map -> 'js_view' => 'ViewTreatmentBlock'
	window.ViewTreatmentBlock = vc.shortcode_view.extend({
		// Render method called after element is added( cloned ), and on first initialisation
		render: function () {
	        console && console.log('ViewTreatmentBlock: render method called.');
			//make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. 
			//Otherwise, you will fully rewrite what VC will do at this event
			window.ViewTreatmentBlock.__super__.render.call(this); 

			var params 			= this.model.attributes.params,
				$el 			= this.$el,
				$wrapper 		= $el.find('.wpb_element_wrapper'),
				$titel 			= $('<h3>').html(params.title).css('color', params.color),
				$subtitel 		= $('<div>').addClass('h4').html(params.subtitle).css('color', params.color),
				$img 			= $('<img>'),
				$imgContainer	= $('<div>').addClass('img-container'),
				$textContainer	= $('<div>').addClass('text-container');
			
			console && console.log('params', params);

			$wrapper.empty();
			$imgContainer.append($img);
			$textContainer.append($titel).append($subtitel);
			$wrapper.append($imgContainer).append($textContainer);

			console && console.log(this.$el.html());
			
			return this;
		},
		ready: function (e) {
	        console && console.log('ViewTreatmentBlock: ready method called.');
			window.ViewTreatmentBlock.__super__.ready.call(this, e);
			console && console.log(this);

			
			return this;
		},
		//Called every time when params is changed/appended. Also on first initialisation
		changeShortcodeParams: function (model) {
	        console && console.log('ViewTreatmentBlock: changeShortcodeParams method called.');
	        console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
	        console && console.log(model.get('params'));
			window.ViewTreatmentBlock.__super__.changeShortcodeParams.call(this, model);
			
			this.updateTexts();
		},
		changeShortcodeParent: function (model) {
	        console && console.log('ViewTreatmentBlock: changeShortcodeParent method called.');
			window.ViewTreatmentBlock.__super__.changeShortcodeParent.call(this, model);
		},
		deleteShortcode: function (e) {
	        console && console.log('ViewTreatmentBlock: deleteShortcode method called.');
			window.ViewTreatmentBlock.__super__.deleteShortcode.call(this, e);
		},
		editElement: function (e) {
	        console && console.log('ViewTreatmentBlock: editElement method called.');
			window.ViewTreatmentBlock.__super__.editElement.call(this, e);
		},
		clone: function (e) {
	        console && console.log('ViewTreatmentBlock: clone method called.');
			window.ViewTreatmentBlock.__super__.clone.call(this, e);
		},

		updateTexts: function() {
			var params 			= this.model.attributes.params,
				$el 			= this.$el,
				$wrapper 		= $el.find('.wpb_element_wrapper'),
				$titel 			= $wrapper.find('h3').html(params.title).css('color', params.color),
				$text 		    = $wrapper.find('div.h4').html(params.text).css('color', params.color);
		},
	});

})(jQuery);
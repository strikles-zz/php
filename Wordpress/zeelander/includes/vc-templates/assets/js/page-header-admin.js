(function($) {

	// comment for debugging;
	var console = undefined;

	console && console.log('admin_enqueue_js.js is loaded');
	// Come from vc_map -> 'js_view' => 'ViewPaginaHeader'
	window.ViewPaginaHeader = vc.shortcode_view.extend({
		// Render method called after element is added( cloned ), and on first initialisation
		render: function () {
	        console && console.log('ViewPaginaHeader: render method called.');
			//make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. 
			//Otherwise, you will fully rewrite what VC will do at this event
			window.ViewPaginaHeader.__super__.render.call(this); 

			var params 			= this.model.attributes.params,
				$el 			= this.$el,
				$wrapper 		= $el.find('.wpb_element_wrapper'),
				$titel 			= $('<h1>').html(params.title).css('color', params.color),
				$subtitel 		= $('<div>').addClass('h2').html(params.subtitle).css('color', params.color),
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
	        console && console.log('ViewPaginaHeader: ready method called.');
			window.ViewPaginaHeader.__super__.ready.call(this, e);
			console && console.log(this);

			
			return this;
		},
		//Called every time when params is changed/appended. Also on first initialisation
		changeShortcodeParams: function (model) {
	        console && console.log('ViewPaginaHeader: changeShortcodeParams method called.');
	        console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
	        console && console.log(model.get('params'));
			window.ViewPaginaHeader.__super__.changeShortcodeParams.call(this, model);
			
			this.updateImage();
			this.updateTexts();
		},
		changeShortcodeParent: function (model) {
	        console && console.log('ViewPaginaHeader: changeShortcodeParent method called.');
			window.ViewPaginaHeader.__super__.changeShortcodeParent.call(this, model);
		},
		deleteShortcode: function (e) {
	        console && console.log('ViewPaginaHeader: deleteShortcode method called.');
			window.ViewPaginaHeader.__super__.deleteShortcode.call(this, e);
		},
		editElement: function (e) {
	        console && console.log('ViewPaginaHeader: editElement method called.');
			window.ViewPaginaHeader.__super__.editElement.call(this, e);
		},
		clone: function (e) {
	        console && console.log('ViewPaginaHeader: clone method called.');
			window.ViewPaginaHeader.__super__.clone.call(this, e);
		},

		updateTexts: function() {
			var params 			= this.model.attributes.params,
				$el 			= this.$el,
				$wrapper 		= $el.find('.wpb_element_wrapper'),
				$titel 			= $wrapper.find('h1').html(params.title).css('color', params.color),
				$subtitel 		= $wrapper.find('div.h2').html(params.subtitle).css('color', params.color);
		},


		updateImage: function() {
			var $img 		= this.$el.find('img'),
				$container 	= $img.parent();
				$model 		= $( '[data-model-id=' + this.model.id + ']' ),
				model 		= $model.data('model'),
				params 		= model.get('params'),
				imgID 		= params.image;


			$.post(window.ajaxurl, {
				action: 	'wpb_single_image_src',
				content: 	imgID
			})			
			.done( function ( src ) {
				//console.log('src', src);
				// remove thumbnail extension so we van load whole image
				var sizePos = src.indexOf('150x150');

				if ( sizePos !== false ) {
					src = src.replace('-150x150', '', src);
					console && console.log(src);
					$img.attr('src', src);

					$container.css('background-image', 'url("' + src + '")');

				}
			});
		}
	});

})(jQuery);
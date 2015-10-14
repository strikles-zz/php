(function($, App) {

	'use strict';
	$(function() {
		if (!$('body.home').length) {
			return false;
		}

		var slider = new Slider({
			debug:				false,
			container:			$('body.home .header-slider-container:first'),
			left:				$('body.home .header-slider-container:first .arrow.left'),
			right:				$('body.home .header-slider-container:first .arrow.right'),
		});

		slider.init().start();

		console.log('home');
	});

	var Slider = function(options) {
		var defaults = {
			debug:				false,
			container:			undefined,
			left:				undefined,
			right:				undefined,
			speed:				5000
		};

		this.options = $.extend(true, defaults, options);

		this.$el 			= options.container;
		this.$left 			= options.left;
		this.$right			=  options.right;
		this.slides 		= [];
		this.index 			= 0;
		this.initialized 	= false;
		this.running 		= false;
		this.timer 			= 0;

		return this;
	};

	Slider.prototype = {
		init: function() {
			var self = this;
			var $slides = self.$el.find('.slide');

			$.each($slides, function(index, el) {

				var slide = new Slide($(el));
				self.slides.push(slide);

				if (index !== 0) {
					slide.$el.css('opacity', 0);
				}
			});

			self.$el.hover(function() {
				self.pause();
			}, function() {
				self.start();
			});

			self.$left.click(function(e) {
				e.preventDefault();
				self.prev();
			})
			// and the hover effects
			.hover(function() {
				$(this).velocity({scale: 1.3});
			}, function() {
				$(this).stop().velocity({scale: 1});
			});

			self.$right.click(function(e) {
				e.preventDefault();
				self.next();
			})
			// and the hover effects
			.hover(function() {
				$(this).velocity({scale: 1.3});
			}, function() {
				$(this).stop().velocity({scale: 1});
			});

			return self;

		},

		start: function() {
			var self = this;
			console.log('starting slider...');
			clearInterval(self.timer);

			// preload first slide
			if (self.initialized === false) {
				self.slides[0].preload(function(slide) {
					console.log('first image is loaded');
					self.initialized = true;
					slide.animateIn();
					console.log(self.options);
					if (self.options.debug !== true) {

						self.timer = setInterval(function() {
							self.next();
						}, self.options.speed);
					}
				});

			} else {
				self.timer = setInterval(function() {
					self.next();
				}, self.options.speed);
			}
		},

		pause: function() {
			console.log('paused');
			var self = this;
			clearInterval(self.timer);
		},

		next: function() {
			console.log('next slide');
			var self = this;
			self.pause();
			var currentSlideIndex = self.index;

			self.index++;
			if (self.index >= self.slides.length) {
				self.index = 0;
			}

			self.slides[currentSlideIndex].animateOut();
			self.slides[self.index].animateIn();
			self.start();
		},

		prev: function() {
			console.log('previous slide');
			var self = this;
			self.pause();
			var currentSlideIndex = self.index;

			self.index--;
			if (self.index < 0) {
				self.index = self.slides.length - 1;
			}

			self.slides[currentSlideIndex].animateOut();
			self.slides[self.index].animateIn();
			self.start();
		}
	};

	var Slide = function($slide) {
		this.$el         = $slide;
		this.background  = this.$el.attr('data-background');
		this.$titel      = this.$el.find('.titel');
		this.$ondertitel = this.$el.find('.ondertitel');
		this.loaded      = false;
	};

	Slide.prototype = {
		preload: function(cb) {

			var self = this;
			if (this.loaded && cb && typeof cb === 'function') {
				cb(self);

			} else {

				console.log('preloading slide');
				var img = new Image();
				img.src = self.background;
				img.onload = function() {
					if (cb && typeof cb === 'function') {
						self.$el.css({
							'background-image': 'url(' + self.background + ')'
						});
						self.loaded = true;
						cb(self);
					}
				};
			}
		},

		animateIn: function() {
			console.log('animating in');
			var slide = this;

			slide.preload(function(slide) {

				slide.$el.velocity({opacity: [1,0]});

				slide.$titel.velocity({opacity: 0},0).delay(500)
				 	.velocity('transition.slideLeftIn');

				slide.$ondertitel.velocity({opacity: 0},0).delay(500)
					.velocity('transition.slideLeftIn');

			});
		},

		animateOut: function() {
			var slide = this;
			slide.$el.velocity({opacity: [0,1]});
		}
	};





})(jQuery, window.App);

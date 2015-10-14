/*global $:true*/
'use strict';

// Set debug to false to disable all console.logs
var App = global.App = {
	debug: false
};

var $ = global.$ = window.jQuery;

require('velocity-animate');
require('velocity-animate/velocity.ui');

require('../vendor/bootstrap/javascripts/bootstrap/modal');
require('../vendor/bootstrap/javascripts/bootstrap/dropdown');
require('../vendor/bootstrap/javascripts/bootstrap/collapse');
require('../vendor/bootstrap/javascripts/bootstrap/tooltip');

require('./modules/_slider');
require('./modules/_wiezijnwe');
require('./modules/_velocityeffects');
require('./modules/_acf-maps');

// Turn of console.log for unsupportedbrowsers and when debug is set to false;
require('./modules/_console');


var resizeTimer;

function resize() {
	var windowHeight = $(window).height(),
		contentHeight = $('#page-content').height(),
		headerHeight = $('#header').height(),
		footerHeight = $('#footer').innerHeight(),
		documentHeight = headerHeight + footerHeight + contentHeight;


	if (documentHeight >= windowHeight) {
		$('#footer').css({
			marginTop: 0
		});

	} else {

		$('#footer').css({
			marginTop: windowHeight - documentHeight
		});
	}

}

function init() {

	$('#nav_searchbtn').on('click',function(){
		if ($('#nav_searchform').width() === 0) {
			$('#nav_searchform').velocity({width: "150px"}, {easing: "easeInCosine", duration: 600, complete: function(){
				$('#nav_searchform input').addClass('placeholder');
				$('#nav_searchform input').focus();
			}});
		}
		else {
			if ($('#nav_searchform input').val()) {
				$('#nav_searchform form').submit();
			}
			else {
				$('#nav_searchform input').removeClass('placeholder');
				$('#nav_searchform').velocity({width: "0px"}, {easing: "easeInCosine", duration: 600,delay:200, complete: function(){
				}});
			}
		}
	});

	// if ($('.page-news-overview').length) {
	// 	$('.title').each(function(){
	// 		if ($(this).height() < $(this).children('h3').first().height()){
	// 			$('.title').height($(this).children('h3').first().height());
	// 		}
	// 	});
	// }

	var hashTagActive = "";
	$(".navigation-letter").click(function (event) {

		if (location.search.length !== 0) {
			return true;
		}
		event.preventDefault();
		//calculate destination place
		var dest = 0;
		if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
			dest = $(document).height() - $(window).height();
		} else {
			dest = $(this.hash).offset().top - 40;
		}
		//go to destination
		$('html,body').animate({
			scrollTop: dest
		}, 1000, 'swing');
		hashTagActive = this.hash;
	});


}

$ (window).on('resize',function(){
	clearTimeout(resizeTimer);
	resizeTimer = setTimeout(resize, 200);
});

$(window).load(function() {
	resize();
});

$( document ).ready(function() {
	init();
});

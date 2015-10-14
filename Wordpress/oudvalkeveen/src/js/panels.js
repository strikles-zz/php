
var resizeTimer;
var $ = jQuery;

'use strict';
function resize() {

	clearTimeout(resizeTimer);
	resizeTimer = setTimeout(function() {

		$('.trapezoid').each(function(){

			// Adjust Height
			var height = $(this).height() + 15;
			var diff = -$(this).height() - 18;

			var img_height = $(this).find('img').height();
			var img_diff = -img_height -18;

			// $(this).find('.trapezoid-bg').css('border-top',img_height+'px solid #fff');
			// $(this).find('.trapezoid-bg .top').css('top',img_diff+'px');

			$(this).find('.trapezoid-background').css('height', img_height+'px');


		});

		$('.sub-menu').each(function(){

			// Adjust Height
			var height = $(this).height() + 30;
			var diff = -$(this).height() - 48;

			$(this).find('.sub-menu-bg').css('border-top',height+'px solid #fff');
			$(this).find('.sub-menu-bg .top').css('top',diff+'px');

		});
	}, 100);

}
function init() {

	$('.trapezoid').append('<div class="trapezoid-background"></div>');

	$('.trapezoid').each(function(){

		//add extra elements and nesting
		var currentcontent = $(this).html();
		//$(this).html('<div class="trapezoid-bg"><div class="top"></div><div class="bottom"></div></div><div class="trapezoid-content">' + currentcontent + '</div>');

	});


	resize();

	$('.trapezoid').velocity('fadeIn');

	$('.sub-menu').each(function(){

		//add extra elements and nesting
		var currentcontent = $(this).html();
		$(this).html('<div class="sub-menu-bg"><div class="top"></div><div class="bottom"></div></div><div class="sub-menu-content">' + currentcontent + '</div>');

	});

	resize();

	$('.sub-menu').show();

}

$( document ).ready(function() {
	init();

	$( window ).resize(function(){
		resize();
	});
});






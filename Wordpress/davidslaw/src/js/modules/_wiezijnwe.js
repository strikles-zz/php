(function($) {

	'use strict';

	function sameSizeElements() {

		var thumbs_height = $('.employee-thumbnails').height();
		var background_height = $('.employee-background').height();
		var container_height = $('.employees-container').height();

		var max_height = Math.max(thumbs_height, background_height, container_height);

		$('.employee').each(function() {

			var height = $(this).height;
			console.log('heights', max_height, height);
		});

		$('.employee-thumbnails').height(max_height);
		$('.employee-background').height(max_height);
		$('.employees-container').height(max_height);

		// if ($('.employee-thumbnails').height()) {

		// 	var thumbnailsHeihght = $('.employee-thumbnails').height();
		// 	var thumbnailsHeihghtStr = thumbnailsHeihght + 'px';
		// 	var minHeight = 0;

		// 	$('.employee-content').each(function() {

		// 		console.log($(this).height());
		// 	 	if ( $(this).height() < thumbnailsHeihght ){
		// 	 		$(this).css('min-height', thumbnailsHeihghtStr);
		// 	 	}

		// 	 	if ($(this).height() > minHeight) {
		// 	 		minHeight = $(this).height() ;
		// 	 	}
		// 	});

		// 	var minHeihgtStr = 200 + minHeight + 'px';
		// 	//$('.employees-container').css('min-height',minHeihgtStr) ;
		// }
	}

	function selectEmployee() {

		var $employeelist = $('.employee-entry');

		console.log('$el', $employeelist.length);
		// $('.employee-entry').each(function() {

		// 	$(this).click(function(ev) {

		// 		ev.preventDefault();

		// 		$('.employee-entry').removeClass('active');
		// 		$(this).addClass('active');

		// 		var employeeID = $(this).attr('data-employeeID');
		// 		console.log('employeelist entry', employeeID);

		// 		//$('.employee').removeClass('visible').removeClass('hidden').addClass('hidden');
		// 		//$('#container-'+employeeID).removeClass('hidden').addClass('visible');
		// 		$('.employee-thumbnails').removeClass('hidden').addClass('hidden');
		// 		$('.employee-background').removeClass('hidden');

		// 		$('.employee.visible').velocity('fadeOut', { duration: 200 , complete: function() {

		// 			$('.employee').removeClass('visible').removeClass('hidden').addClass('hidden');
		// 			$('#container-'+employeeID).velocity('fadeIn', { duration: 100 , complete: function() {
		// 				$('#container-'+employeeID).removeClass('hidden').addClass('visible');
		// 			}});
		// 		}});

		// 	});

		// });
	}

	function employeeSwitch() {

		$('.employee-thumbnail-container').each( function() {

			$(this).on('click', function() {

				var extractedID = $(this).attr('id');
				var sanitizedContainerdID = extractedID.replace('thumbnail', '#container');

				$('.employee-thumbnails').addClass('hidden');
				$('.employee').removeClass('visible').removeClass('hidden').addClass('hidden');
				$(sanitizedContainerdID).removeClass('hidden').addClass('visible');
				$('.employee-background').removeClass('hidden');


				// $('.employee.visible').velocity('fadeOut', { duration: 100 , complete: function() {

				// 	$('.employee.visible').removeClass('visible').addClass('hidden');
				// 	$(sanitizedContainerdID).removeClass('hidden').addClass('visible').hide();

				// 	$('.employee.visible .employee-name,.employee.visible .employee-function,.employee.visible .employee-description,.employee.visible .employee-contact').hide();
				// 	$(sanitizedContainerdID).velocity('fadeIn',{ duration: 300 });

				// 	$('.employee.visible .employee-name').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 	$('.employee.visible .employee-function').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 	$('.employee.visible .employee-description').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 	$('.employee.visible .employee-contact').velocity('transition.slideLeftIn', { duration: 600, delay: 300});

				// }});

				//sameSizeElements();

				// $('.employee-thumbnail-container.active').removeClass('active');
				// $(this).addClass('active');

				// var extractedID = $(this).attr('id');
				// var sanitizedContainerdID = extractedID.replace('thumbnail', '#container');
				// var sanitizedPictureID = extractedID.replace('thumbnail', '#picture');
				// var identifier = extractedID.replace('thumbnail', 'container');

				// if (identifier !== $('.employee.visible').attr('id')) {

				// 	$('.employee.visible').velocity('fadeOut', { duration: 100 , complete: function() {

				// 		$('.employee.visible').removeClass('visible').addClass('hidden');
				// 		$(sanitizedContainerdID).removeClass('hidden').addClass('visible').hide();

				// 		$('.employee.visible .employee-name,.employee.visible .employee-function,.employee.visible .employee-description,.employee.visible .employee-contact').hide();
				// 		$(sanitizedContainerdID).velocity('fadeIn',{ duration: 300 });

				// 		$('.employee.visible .employee-name').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 		$('.employee.visible .employee-function').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 		$('.employee.visible .employee-description').velocity('transition.slideLeftIn', { duration: 600, delay: 300});
				// 		$('.employee.visible .employee-contact').velocity('transition.slideLeftIn', { duration: 600, delay: 300});

				// 	}});

				// 	$('.employee-background img.visible').velocity('fadeOut', {duration: 1000, delay: 300}).removeClass('visible');
				// 	$(sanitizedPictureID).velocity('fadeIn', {duration: 1000, delay: 300}).addClass('visible');
				// }

			});

		});
	}

	$('.employee-thumbnail-container').on('mouseenter', function() {

		$(this).addClass('active');

		$('.employee-entry').removeClass('active');
		var el_id = $(this).attr('id').replace('thumbnail-', '');
		var $menu_el = $('.employee-entry[data-employeeid='+el_id+']');
		$menu_el.addClass('active');
	});

	$('.employee-thumbnail-container').on('mouseleave', function() {

		$(this).removeClass('active');
		$('.employee-entry').removeClass('active');
	});

	$('.employee-entry').on('mouseenter', function() {

		$(this).addClass('active');

		$('.employee-thumbnail-container').removeClass('active');
		var employee_id = $(this).attr('data-employeeid');
		var thumbnail_id = '#thumbnail-'+employee_id;
		$(thumbnail_id).addClass('active');
	});

	$('.employee-entry').on('mouseleave', function() {

		$(this).removeClass('active');
		$('.employee-thumbnail-container').removeClass('active');
	});

	$ (window).on('resize',function(){
		//sameSizeElements();
	});

	$(window).load(function() {
		//sameSizeElements();
		//employeeSwitch();
		//selectEmployee();
	});

	$( document ).ready(function() {
	});

})(jQuery);

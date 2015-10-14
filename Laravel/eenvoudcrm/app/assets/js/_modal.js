(function($, App, oTable) {

    'use strict';

    $(function() {

    	//console.log('me');

        $('body').on('click', '.modal-popup', function(e) {

			e.preventDefault();
			var href = $(this).attr('href') || $(this).attr('data-action');
			var $modal = $('#ajax-modal');
			//$('body').modalmanager('loading');

			$modal.load(href, '', function(){

	  			$modal.modal();
	  			$modal.find('form').on('submit', function(e) {

					e.preventDefault();
					var $form = $(this);

					$.ajax({
						method: $form.attr('method'),
						url: $form.attr('action'),
						data: $form.serialize(),

						success:function(data) {

							console.log(data);
							if (data.success && data.reload === true) {

								if (App.ajax.pages.length) {
									App.ajax.pages[App.ajax.pages.length - 1].refresh();

								} else {

									//console.log('reloading');
									if (oTable) {
										// Reload parent Otable
										oTable.dataTable().api().ajax.reload(null, false);
									} else {
										location.reload();
									}
								}
								$modal.find('button.btn-default').click();
								//console.log($modal.modal());
								//$modal.modal().hideModal();
							} else if (data.error) {
								alert(data.error);
							}
						}
					});
				});
			});
		});
    });

})(jQuery, window.App, window.oTable);

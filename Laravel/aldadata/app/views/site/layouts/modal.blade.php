<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title">{{ $title }}</h4>
	</div>
	<div class="modal-body">
		<!-- Notifications -->
		@include('notifications')
		<!-- ./ notifications -->
		
		@yield('content')
	</div>
	<div class="modal-footer">
		@yield('footer')
	</div>
</div><!-- /.modal-content -->
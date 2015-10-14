<div class="ajax-content" data-url="{{ Request::url() }}" data-id="{{ isset($model) ? $model->id : 0 }}">

	<!-- Notifications -->
	@include('notifications')
	<!-- ./ notifications -->

	<div class="container-fluid">
		<div class="row">
			<div class="iframe-header row">
				<div class="container">
					<div class="row">
						<div class="col-xs-10 text-center">
							<h3>{{ $title }}</h3>
						</div>
						<div class="col-xs-2">
							<div class="pull-right">
								<button type="button" class="btn btn-default btn-xs btn-inverse close-ajax-page"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Content -->
	<div class="content">
		<div class="container">
			@yield('content')
		</div>
	</div>
	<!-- ./ content -->

	<!-- Footer -->
	<footer class="clearfix">
		@yield('footer')
	</footer>
	<!-- ./ Footer -->

</div>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		@section('title')
			{{{ $title }}}
		@show
	</title>

	<meta name="keywords" content="@yield('keywords')" />
	<meta name="author" content="@yield('author')" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	<meta name="description" content="@yield('description')" />

	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	<meta name="google-site-verification" content="">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="@yield('description')">
	<meta name="DC.creator" content="@yield('author')">

	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- This is the traditional favicon.
	 - size: 16x16 or 32x32
	 - transparency is OK
	 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
	<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

	<!-- iOS favicons. -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

	<!-- CSS
		================================================== -->
        <!--
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">
	    -->

	    <link rel="stylesheet" href="{{asset('assets/css/vendor.min.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/vendor/colorbox/example2/colorbox.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-modal/css/bootstrap-modal.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}">

	    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

	    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/themes/ui-lightness/jquery-ui.min.css')}}">
	    <!--<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/themes/ui-lightness/theme.css')}}">-->

	  	<link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui-bootstrap/jquery.ui.theme.css')}}">
	    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui-bootstrap/jquery.ui.theme.font-awesome.css')}}">

	    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

	<style>
	.tab-pane {
		padding-top: 20px;
	}
	</style>

	@yield('styles')

	<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/underscore/underscore-min.js')}}"></script>
	<script src="{{asset('assets/vendor/colorbox/jquery.colorbox.js')}}"></script>
	<script src="{{asset('assets/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>

	<script src="{{asset('assets/vendor/bootstrap-modal/js/bootstrap-modalmanager.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap-modal/js/bootstrap-modal.js')}}"></script>

	<script src="{{asset('assets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/vendor/typeahead.js/dist/typeahead.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/scripts.min.js')}}"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
	<script type="text/javascript">
		var _gaq = _gaq || [];
	  	_gaq.push(['_setAccount', 'UA-31122385-3']);
	  	_gaq.push(['_trackPageview']);

	  	(function() {
	   		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  	})();

	</script> -->

</head>

<body class="iframe">
	<div class="container-fluid">
		{{-- <div class="row">
			<div class="iframe-header row">
				<div class="container">
					<div class="row">
						<div class="col-xs-10 text-center">
							<h3>{{ $title }}</h3>
						</div>
						<div class="col-xs-2">
							<div class="pull-right">
								<button class="btn btn-default btn-xs btn-inverse close_popup"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>

	<div class="container">

		<!-- Notifications -->
		@include('notifications')
		<!-- ./ notifications -->

	</div>


		<div class="content">
			<div class="container">
				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>
		</div>

		<!-- Footer -->
		<footer class="clearfix">
			@yield('footer')
		</footer>
		<!-- ./ Footer -->


	<div id="ajax-modal" class="modal fade" tabindex="-1" style="display: none;"></div>

	<!-- Javascripts -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/wysihtml5/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('assets/js/wysihtml5/bootstrap-wysihtml5.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
    <script src="{{asset('assets/js/prettify.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.close_popup').click(function(){
			parent.oTable.fnReloadAjax();
			parent.jQuery.fn.colorbox.close();
			return false;
		});

		$('#deleteForm').submit(function(event) {
			var form = $(this);
			$.ajax({
				type: form.attr('method'),
				url: form.attr('action'),
				data: form.serialize()
			}).done(function() {
				parent.jQuery.colorbox.close();
				parent.oTable.fnReloadAjax();
			}).fail(function() {

			});
			event.preventDefault();
		});
	});
	$('.wysihtml5').wysihtml5();
	$(prettyPrint);


</script>

    @yield('scripts')

</body>

</html>
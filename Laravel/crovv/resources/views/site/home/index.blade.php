@extends('app')

@section('header')

	<div class="container home-header">
		<div class="solar">
			<div class="solar-circle mars">
				<div class="solar-circle earth">
					<div class="solar-circle venus">
						<div class="solar-circle mercury">
							<button class="solar-circle sun">
								<i class="glyphicon glyphicon-play"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h2 class="text-center">Crovv, never miss a single meeting again, ever.</h2>
		<p class="text-center">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
		<div class="row text-center home-cta">
			<a href="/auth/register" class='btn-join'>Join Now</a>&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;<a href="auth/login" class="btn-login">Login</a>
		</div>

	</div>
@endsection

@section('content')
	<div class="content container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 stats">
				<div class="row">
					<div class="col-xs-4 stats-bold">1920</div>
					<div class="col-xs-4 stats-bold">50.000+</div>
					<div class="col-xs-4 stats-bold">160</div>
				</div>
				<div class="row">
					<div class="col-xs-4">people currently participating</div>
					<div class="col-xs-4">minutes of recorded video</div>
					<div class="col-xs-4">groups</div>
				</div>
			</div>
		</div>

		<div class="row spacer-5">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="text-center">What is Crovv?</h2>
				<p class="text-center lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
			</div>
		</div>

		<div class="row text-center spacer-5">
			<div class="col-sm-8 col-sm-offset-2">
				{!! Html::image('images/misc/home.png', 'home', array('class' => 'img-contain')) !!}
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<h2 class="text-center">Why use Crovv?</h2>
				<p class="text-center lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">

				<div class="row">
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/webcam.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Use your webcam</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/text.png', 'text', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Excange your thoughts Live</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/group.png', 'yyy', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Join meetings and presentations</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/globe.png', 'zzz', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>All around the world</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="dotour">Not convinced yet ? Take the Tour</div>
@endsection




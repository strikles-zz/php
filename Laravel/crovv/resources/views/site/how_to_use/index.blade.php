@extends('app')

@section('header')
	<div class="container home-header">
		<p class="header-text text-center">How to use</p>
		<p class="text-center">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
	</div>
@endsection

@section('content')
	<div class="content container">

		<div class="row">
			<div class="col-xs-10 col-xs-offset-1">

				<!-- row 1 -->
				<div class="row howtouse_1st">
					<div class="col-sm-5">
						<div class="row top-gap">
							<div class="col-xs-3">
								{!! Html::image('images/circular/webcam.png', 'home', array('class' => 'img-responsive img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Call</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
					<div class="col-sm-7">
						{!! Html::image('images/misc/demo.png', 'home', array('class' => 'img-label img-responsive demo')) !!}
					</div>
				</div>

				<!-- row 2 -->
				<div class="row howtouse_2nd">
					<div class="col-sm-6">
						{!! Html::image('images/misc/usage.png', 'home', array('class' => 'img-responsive img-label')) !!}
					</div>

					<div class="col-sm-6">
						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/webcam2.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Call</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
				</div>

				<!-- row 3 -->
				<div class="row howtouse_3rd">
					<h2 class="text-center">There is more!</h2>
					<p class="text-center lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
				</div>

				<!-- row 4 -->
				<div class="row howtouse_4th top-gap">
					<div class="col-xs-12 usage_background hidden-xs hidden-sm"></div>
					<div class="col-sm-12 col-md-6 usage_left">

						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/text.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Exchange your thoughts live</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/globe.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>All around the world</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/webcam.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Use your webcam</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-3">
								{!! Html::image('images/circular/group.png', 'home', array('class' => 'img-label')) !!}
							</div>
							<div class="col-xs-9">
								<h4>Join meetings and presentations</h4>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection




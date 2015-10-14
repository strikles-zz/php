@extends('app')

@section('header')
	<div class="home-header">
		<p class="header-text text-center">Sign-In</p>
	</div>
@endsection

@section('content')

	<div class="content">

		{!! Form::open(array('url' => url('foo/bar'), 'class'=>'form', 'id'=>'signin-form')) !!}

		<div class="container">
			<div class="row">

				<div class="col-sm-10 col-sm-offset-1">
					<div class="row">

						<!-- left -->
						<div class="col-sm-4 signin-col">

							<!-- username -->
							<div class="form-group">
								<div class="row">
									{!! Form::label('Username') !!}
								</div>
								<div class="row">
									{!! Form::text('username', null, array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
								</div>
								<div class="row">
									{!! Form::button('forgot username ?', array('class'=>'btn forgot', 'placeholder'=>'')) !!}
								</div>
							</div>

							<!-- password -->
							<div class="form-group">
								<div class="row">
									{!! Form::label('Password') !!}
								</div>
								<div class="row">
									{!! Form::password('password', array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
								</div>
								<div class="row">
									{!! Form::button('forgot password ?', array('class'=>'btn forgot', 'placeholder'=>'')) !!}
								</div>
							</div>

							<!-- submit -->
							<div class="row">
								<div class="col-sm-4 left-btn">
									{!! Form::submit('Login', array('class'=>'btn btn-form pull-left')); !!}
								</div>
								<div class="col-sm-8"></div>
							</div>
						</div>

						<!-- middle -->
						<div class="col-sm-2 col-sm-offset-1">
							<h2>Of meld u ann via</h2>
							<div class="row">
								<div class="col-sm-4">
									{{ HTML::image('/images/circular/linkedin.png') }}
								</div>
								<div class="col-sm-8">
									Linkedin
								</div>
							</div>
						</div>

						<!-- right -->
						<div class="col-sm-4 signin-registration">
							<h2>Or register for free</h2>
							<p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
							<div class="row">
								<div class="col-sm-4 left-btn">
									{!! Form::button('Register', array('class'=>'btn btn-form pull-left')); !!}
								</div>
								<div class="col-sm-8"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}

	</div>

@endsection

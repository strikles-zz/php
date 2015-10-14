@extends('app')

@section('header')
	<div class="home-header">
		<p class="header-text text-center">Registration</p>
	</div>
@endsection

@section('content')

	<div class="content">

		{!! Form::open(array('class'=>'form', 'name'=>'whatever', 'id'=>'registration-form', 'style'=>'border: solid gray 1px')) !!}

		<!-- progress -->
		<div id="registration">
			<ul class="progress_bar">
				<li class="active">Account Info</li>
				<li>Personal Info</li>
				<li>Webcam settings</li>
				<li>Privacy Settings</li>
				<li>Confirm</li>
			</ul>
		</div>

		<div class="registration_errors">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>

		<fieldset class="reg_account_info">
			<div class="container">
				<div class="row">

					<div class="col-sm-8 col-sm-offset-2">
						<div class="row">
							<div class="col-sm-5">

								<div class="row">
									<div class="form-group">
										{!! Form::label('Email') !!}
										{!! Form::text('email', old('email'), array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										{!! Form::label('Password') !!}
										{!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										{!! Form::label('Confirm Password') !!}
										{!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										{!! Form::button('Next', array('class'=>'btn btn-form pull-left next')); !!}
									</div>
								</div>

							</div>

							<!-- gap -->
							<div class="col-sm-2"></div>

							<!-- right -->
							<div class="col-sm-5">

								<div class="row">
									<div class="col-xs-12">
										<h2>Use your Webcam</h2>
										<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										{!! Html::image('images/misc/home.png', 'home', array('class' => 'img-responsive')) !!}
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</fieldset>

		<fieldset class="reg_personal_info">
			<div class="container">
				<div class="row">

					<div class="col-sm-8 col-sm-offset-2">
						<div class="row">

							<div class="col-sm-5">

								<div class="row">
									<div class="form-group">
										{!! Form::label('First Name') !!}
										{!! Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										{!! Form::label('Last Name') !!}
										{!! Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										{!! Form::label('Company Name') !!}
										{!! Form::text('company_name', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										{!! Form::label('Company Address') !!}
										{!! Form::text('company_address', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<div class="row">
									<!-- address -->
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												{!! Form::label('Company City') !!}
											</div>
											<div class="col-sm-6">
												{!! Form::label('Company Zip') !!}
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												{!! Form::text('company_city', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
											</div>
											<div class="col-sm-6">
												{!! Form::text('company_zip', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
											</div>
										</div>

									</div>
								</div>

								<!-- country -->
								<div class="row">
									<div class="form-group">
										{!! Form::label('Company Country') !!}
										{!! Form::text('company_country', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<div class="row">
									<div class="form-group">
										{!! Form::label('Company Website') !!}
										{!! Form::text('company_website', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<!-- phone -->
								<div class="row">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-12">
												{!! Form::label('Phone') !!}
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												{!! Form::text('phone_int', null, array('disabled', 'class'=>'form-control', 'placeholder'=>'')) !!}
											</div>
											<div class="col-sm-8">
												{!! Form::text('phone', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
											</div>
										</div>
									</div>
								</div>

								<!-- birthdate -->
								<div class="row">
									<div class="form-group">
										{!! Form::label('Birth date') !!}
										{!! Form::input('date', 'birthdate', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
									</div>
								</div>

								<!-- birthdate -->
								<div class="row">
									<div class="form-group">
										{!! Form::label('Photo') !!}
										{!! Form::file('photo', array('class'=>'form-control')) !!}
									</div>
								</div>

								<!-- buttons -->
								<div class="row">
									<div class="col-sm-4 left-btn">
										{!! Form::button('Previous', array('class'=>'btn btn-form pull-left previous')); !!}
									</div>
									<div class="col-sm-4"></div>
									<div class="col-sm-4 right-btn">
										{!! Form::submit('Next', array('class'=>'btn btn-form pull-right')) !!}
									</div>
								</div>

							</div>

							<!-- gap -->
							<div class="col-sm-2"></div>

							<!-- right -->
							<div class="col-sm-5">
								<h2>Use your Webcam</h2>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset class="reg_webcam_settings">
			<div class="container">
				<div class="row">

					<div class="col-sm-8 col-sm-offset-2">
						<div class="row">

							<div class="col-sm-5">

								<!-- buttons -->
								<div class="row">
									<div class="col-sm-4 left-btn">
										{!! Form::button('Previous', array('class'=>'btn btn-form pull-left previous')); !!}
									</div>
									<div class="col-sm-4"></div>
									<div class="col-sm-4 right-btn">
										{!! Form::submit('Next', array('class'=>'btn btn-form pull-right')) !!}
									</div>
								</div>

							</div>

							<!-- gap -->
							<div class="col-sm-2"></div>

							<!-- right -->
							<div class="col-sm-5">
								<h2>Use your Webcam</h2>
								<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</fieldset>


		<fieldset class="reg_privacy_settings">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">

						<!-- buttons -->
						<div class="row">
							<div class="col-sm-4 left-btn">
								{!! Form::button('Previous', array('class'=>'btn btn-form pull-left previous')); !!}
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 right-btn">
								{!! Form::submit('Next', array('class'=>'btn btn-form pull-right')) !!}
							</div>
						</div>

					</div>

					<!-- gap -->
					<div class="col-sm-2"></div>

					<!-- right -->
					<div class="col-sm-5">
						<h2>Use your Webcam</h2>
						<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset class="reg_confirm">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">

						<!-- buttons -->
						<div class="row">
							<div class="col-sm-4 left-btn">
								{!! Form::button('Previous', array('class'=>'btn btn-form pull-left previous')); !!}
							</div>
							<div class="col-sm-4"></div>
							<div class="col-sm-4 right-btn">
								{!! Form::submit('Next', array('class'=>'btn btn-form pull-right')) !!}
							</div>
						</div>

					</div>

					<!-- gap -->
					<div class="col-sm-2"></div>

					<!-- right -->
					<div class="col-sm-5">
						<h2>Use your Webcam</h2>
						<p class="lighter-sm">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het heeft niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in elektronische letterzetting. Het is in de jaren '60 populair geworden met de introductie van Letraset vellen met Lorem Ipsum passages en meer recentelijk door desktop publishing software zoals Aldus PageMaker die versies van Lorem Ipsum bevatten.</p>
					</div>
				</div>
			</div>
		</fieldset>

		{!! Form::close() !!}

	</div>

@endsection

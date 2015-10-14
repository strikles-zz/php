@extends('app')

@section('header')
	<div class="home-header">
		<p class="header-text text-center">Profile</p>
	</div>
@endsection

@section('content')
	<div class="content container">

		<div class="row top-gap">
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">

				{!! Form::open(array('class'=>'form', 'name'=>'whatever', 'id'=>'profile-form', 'files' => true)) !!}

				<!-- step 1 -->
				<div class="row">
					<div class="form-group">
						{!! Form::label('Email') !!}
						{!! Form::text('email', (isset($user) ? $user->email : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
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

				<!-- step 2 -->
				<div class="row">
					<div class="form-group">
						{!! Form::label('First Name') !!}
						{!! Form::text('first_name', (isset($user) ? $user->first_name : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group">
						{!! Form::label('Last Name') !!}
						{!! Form::text('last_name', (isset($user) ? $user->last_name : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						{!! Form::label('Company Name') !!}
						{!! Form::text('company_name', (isset($user) ? $user->company_name : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						{!! Form::label('Company Address') !!}
						{!! Form::text('company_address', (isset($user) ? $user->company_address : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
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
								{!! Form::text('company_city', (isset($user) ? $user->company_city : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
							<div class="col-sm-6">
								{!! Form::text('company_zip', (isset($user) ? $user->company_zip : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
						</div>

					</div>
				</div>

				<!-- country -->
				<div class="row">
					<div class="form-group">
						{!! Form::label('Company Country') !!}
						{!! Form::text('company_country', (isset($user) ? $user->company_country : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						{!! Form::label('Company Website') !!}
						{!! Form::text('company_website', (isset($user) ? $user->company_website : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
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
								{!! Form::text('phone_int', null, array('class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
							<div class="col-sm-8">
								{!! Form::text('phone', (isset($user) ? $user->phone : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
						</div>
					</div>
				</div>

				<!-- birthdate -->
				<div class="row">
					<div class="form-group">
						{!! Form::label('Birth date') !!}
						{!! Form::input('date', 'birthdate', (isset($user) ? $user->birthdate : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
					</div>
				</div>

				<!-- birthdate -->
				<div class="row">
					<div class="form-group">
						{!! Form::label('Photo') !!}
						{!! Form::file('photo', array('class'=>'form-control')) !!}
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						{!! Form::submit('Update', array('class'=>'btn btn-form')) !!}
					</div>
				</div>

				{!! Form::close() !!}

			</div>
		</div>

	</div>
@endsection

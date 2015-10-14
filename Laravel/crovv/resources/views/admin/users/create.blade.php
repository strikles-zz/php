<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">
			{{{ $title }}}
			@if(isset($subtitle))
				({{{ $subtitle }}})
			@endif
		</h1>
		@if(Session::has('message'))
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ Session::get('message') }}
			</div>
		@endif

        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		{!! Form::open(array('novalidate' => 'novalidate')) !!}

			<div class="form-group">
				{!! Form::label('First Name') !!}
				{!! Form::text('first_name', (isset($user) ? $user->first_name : old('first_name')), array('class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Last Name') !!}
				{!! Form::text('last_name', (isset($user) ? $user->last_name : old('last_name')), array('class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Birthday') !!}
				{!! Form::input('date', 'birthdate', (isset($user) ? $user->birthdate : old('birthdate')), array('class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Telephone') !!}
				{!! Form::text('phone', (isset($user) ? $user->phone : old('phone')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company Name') !!}
				{!! Form::text('company_name', (isset($user) ? $user->company_name : old('company_name')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company Address') !!}
				{!! Form::text('company_address', (isset($user) ? $user->company_address : old('company_address')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company Country') !!}
				{!! Form::text('company_country', (isset($user) ? $user->company_country : old('company_country')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company City') !!}
				{!! Form::text('company_city', (isset($user) ? $user->company_city : old('company_city')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company Zip') !!}
				{!! Form::text('company_zip', (isset($user) ? $user->company_zip : old('company_zip')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Company Website') !!}
				{!! Form::text('company_website', (isset($user) ? $user->company_website : old('company_website')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Roles') !!}
				{!! Form::select('roles[]', \App\Role::lists('name', 'id'), (isset($roles) ? $roles : null), ['class' => 'form-control', 'multiple']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Email') !!}
				{!! Form::text('email', (isset($user) ? $user->email : old('email')), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Password') !!}
				{!! Form::password('password', array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Password Confirmation') !!}
				{!! Form::password('password_confirmation', array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Confirmed') !!}
				{!! Form::checkbox('confirmed', 1, (isset($user) && (string)$user->confirmed === "1" ? true : false)) !!}
			</div>

			<div class="form-group">
			    {!! Form::submit((isset($user) ? 'Update User' : 'Create User'), array('class'=>'btn btn-primary')) !!}
			</div>

		{!! Form::close() !!}

	</div>
</div>

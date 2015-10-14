@extends('app')

@section('header')
	<div class="home-header">
		<p class="header-text text-center bottom-gap">Groups</p>
	</div>
@endsection

@section('content')
	<div class="content groups-create">
		{!! Form::open(array('class'=>'form', 'files' => true, 'id'=>'registration-form', 'style'=>'border:solid gray 1px')) !!}

		<!-- progress -->
		<div id="groupscreate">
			<ul class="progress_bar">
				<li class="active">Group Info</li>
				<li>Privacy Settings</li>
				<li>Finish</li>
			</ul>
		</div>

		<!-- group info -->
		<fieldset>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">

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

						<!-- country -->
						<div class="row">
							<div class="form-group">
								{!! Form::label('Name') !!}
								{!! Form::text('name', (isset($group) ? $group->name : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								{!! Form::label('Summary') !!}
								{!! Form::textarea('description', (isset($group) ? $group->description : null), array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
						</div>

						<div class="row">
							<div class="form-group">

								<div class="row">
									<div class="col-xs-4">
										{!! Form::label('Country') !!}
									</div>
									<div class="col-xs-4">
										{!! Form::label('City') !!}
									</div>
									<div class="col-xs-4">
										{!! Form::label('Language') !!}
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										{!! Form::text('country', (isset($group) ? $group->country : null), array('required', 'class'=>'form-control')) !!}
									</div>
									<div class="col-xs-4">
										{!! Form::text('city', (isset($group) ? $group->city : null), array('required', 'class'=>'form-control')) !!}
									</div>
									<div class="col-xs-4">
										{!! Form::text('language', (isset($group) ? $group->language : null), array('required', 'class'=>'form-control')) !!}
									</div>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="form-group">
								{!! Form::label('Website') !!}
								{!! Form::text('website', (isset($group) ? $group->website : null), array('class'=>'form-control', 'placeholder'=>'')) !!}
							</div>
						</div>

						<div class="row">
							<div class="form-group">

								<div class="row">
									<div class="col-xs-6">
										{!! Form::label('Meeting Day') !!}
									</div>
									<div class="col-xs-6">
										{!! Form::label('Meeting Time') !!}
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										{!! Form::select('meeting_weekday', array('0' => 'Sunday', '1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday'), (isset($group) ? $group->meeting_weekday : null), array('required', 'class'=>'form-control')) !!}
									</div>
									<div class="col-xs-6">
										{!! Form::text('meeting_time', (isset($group) ? $group->meeting_time : null), array('class'=>'form-control timepicker', 'placeholder'=>'')) !!}
									</div>
								</div>

							</div>
						</div>

						<div class="row">
							<div class="form-group">
								{!! Form::label('Photo') !!}
								{!! Form::file('photo', array('class'=>'form-control')) !!}
							</div>
						</div>

						@if(isset($group))
						<div class="row">
							<div class="form-group">
								{!! Form::label('Chairman') !!}
								{!! Form::select('chairman_id', $group_users->lists('name', 'id'), isset($group->chairman_id) ? $group->chairman_id : null,array('class'=>'form-control')) !!}
							</div>
						</div>
						@endif

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

				</div>
			</div>
		</fieldset>

		<!-- privacy settings -->
		<fieldset>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">

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

				</div>
			</div>
		</fieldset>

		<!-- finish -->
		<fieldset>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">

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

				</div>
			</div>
		</fieldset>

	</div>
@endsection

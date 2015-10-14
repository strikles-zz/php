@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Content --}}
@section('content')
	<!-- Tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	</ul>
	<!-- ./ tabs -->


	<div class="row notifications">
		<div class="col-md-12">
			@if(isset($errors) && count($errors) > 0)
			    <div class="alert alert-danger alert-dismissible alert-fade" role="alert">
				{{ error_log(json_encode($errors)) }}
				@foreach ($errors as $error)
					<div>{{ $error }}</div>
				@endforeach
			    </div>
			@endif
			@if(isset($success))
			    <div class="alert alert-success alert-dismissible alert-fade" role="alert">
			        {{ $success }}
			    </div>
			@endif
		</div>
	</div>
	<!-- ./ csrf token -->

	<div class="tab-content">

		<div class="tab-pane active" id="tab-general">
			{{ Former::open(isset($user) ? URL::to('/user/' . $user->id . '/edit') : '')->id('MyForm')->secure()->rules(['email' => 'required'])->method('POST')->autocomplete('off') }}

			{{ Former::sm_text('email')->label('Email') }}
			{{ Former::sm_text('first_name')->label('First Name') }}
			{{ Former::sm_text('last_name')->label('Last name') }}
			{{ Former::select('types')->multiple()->fromQuery(TaskGroup::all(), 'name', 'id')->label('User Type')  }}

			{{ Former::actions()->large_primary_black_submit('Submit') }}
			{{ Former::close() }}

		</div>
	</div>

@stop


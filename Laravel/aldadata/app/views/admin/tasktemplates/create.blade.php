@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')

	{{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('POST')->autocomplete('off') }}

	<div class="row notifications">
		<div class="col-md-12">
			@if(isset($error))
			    <div class="alert alert-danger alert-dismissible alert-fade" role="alert">
			        {{ $error }}
			    </div>
			@endif
			@if(isset($success))
			    <div class="alert alert-success alert-dismissible alert-fade" role="alert">
			        {{ $success }}
			    </div>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-sm-7">
			{{ Former::legend('Task Template') }}

			{{ Former::sm_text('title') }}
			{{ Former::textarea('description') }}
			{{ Former::sm_select('group_id')->fromQuery(TaskGroup::orderBy('order')->get(), 'name', 'id') }}
			{{ Former::sm_text('deadline_days_gap') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}
			{{ Former::close() }}
		</div>

	</div>

@stop

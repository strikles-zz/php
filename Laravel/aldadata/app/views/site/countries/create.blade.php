@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

	{{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('POST')->autocomplete('off') }}

	<div class="row">
		<div class="col-sm-7">

			{{ Former::legend('Event info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
			{{ Former::sm_text('name') }}
			{{ Former::sm_text('abbreviation') }}
			{{ Former::sm_text('visa_work_permit_required') }}
			{{ Former::sm_textarea('visa_work_permit_procedure') }}
			{{ Former::sm_textarea('notes') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>

		
	</div>



@stop

{{-- Scripts --}}
@section('scripts')

@stop
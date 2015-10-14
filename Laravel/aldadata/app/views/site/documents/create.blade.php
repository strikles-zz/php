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

			{{ Former::legend('Document info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}

			{{ Former::sm_text('type') }}
			{{ Former::sm_text('title') }}
			{{ Former::sm_text('description') }}
			{{ Former::sm_text('url') }}
			{{ Former::sm_text('meta') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>
	</div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop
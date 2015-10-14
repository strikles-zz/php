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

			{{ Former::legend('Airport info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
			{{ Former::sm_text('name') }}

			{{ Former::legend('Address') }}
			{{ Former::sm_text('address.country.name')->useDatalist(Country::all(), 'name')->label('Country')->name('country') }}
			{{ Former::sm_text('address.address')->label('Address') }}
			{{ Former::sm_text('address.postal_code')->label('Postcal code') }}
			{{ Former::sm_text('address.city')->label('City') }}
			{{ Former::sm_text('address.state_province')->label('State/province') }}
			{{ Former::sm_text('address.phone')->label('Phone') }}
			{{ Former::sm_text('address.fax')->label('Fax') }}
			{{ Former::sm_text('address.email')->label('Email') }}
			{{ Former::sm_text('address.website')->label('Website') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>
	</div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop
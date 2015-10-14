@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

	{{ Former::open()->id('MyForm')->secure()->rules(['last_name' => 'required'])->method('POST')->autocomplete('off') }}

	<div class="row">
		<div class="col-sm-7">

			{{ Former::legend('Contact info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
			{{ Former::hidden('company_id') }}
			{{ Former::hidden('venue_id') }}

			{{ Former::sm_text('first_name') }}
			{{ Former::sm_text('last_name')->required() }}
			{{ Former::sm_text('function') }}
			{{ Former::sm_text('address.email')->name('address[email]')->label('Email') }}
			{{ Former::sm_text('address.phone')->name('address[phone]')->label('Phone') }}
			{{ Former::sm_text('references') }}
			{{ Former::sm_text('notes') }}

			{{ Former::legend('Address') }}
			{{ Former::sm_text('address.country.name')->useDatalist(Country::all(), 'name')->label('Country')->name('country') }}
			{{ Former::sm_text('address.address')->name('address[address]')->label('Address') }}
			{{ Former::sm_text('address.postal_code')->name('address[postal_code]')->label('Postcal code') }}
			{{ Former::sm_text('address.city')->name('address[city]')->label('City') }}
			{{ Former::sm_text('address.state_province')->name('address[state_province]')->label('State/province')}}
			{{ Former::sm_text('address.fax')->name('address[fax]')->label('Fax') }}
			{{ Former::sm_text('address.website')->name('address[website]')->label('Website') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>

		@if (isset($model))
		<div class="col-sm-4 col-sm-offset-1 related-models-container">

			@include('site/companies/summary')

			@include('site/venues/summary')

		</div>
		@endif

	</div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop
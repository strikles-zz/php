@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

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

			{{ Former::legend('Basic info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
			{{ Former::hidden('contact_id') }}
			{{ Former::hidden('venue_id') }}
			{{ Former::hidden('event_id') }}

			{{ Former::sm_text('name') }}
			{{ Former::sm_select('type')->options(['Promotor' => 'Promotor', 'Marketing Agency' => 'Marketing Agency', 'Other' => 'Other']) }}
			{{ Former::sm_text('references') }}
			{{ Former::sm_textarea('bank_details')->label('Bank details') }}
			{{ Former::sm_text('tax_number')->label('Tax number') }}
			{{ Former::sm_textarea('notes') }}

			{{ Former::legend('Address') }}
			{{ Former::sm_select('address.country.id')->fromQuery(Country::all(), 'name', 'id')->label('Country')->name('country') }}
			{{ Former::sm_text('address.address')->label('Address') }}
			{{ Former::sm_text('address.postal_code')->label('Postal code') }}
			{{ Former::sm_text('address.city')->label('City') }}
			{{ Former::sm_text('address.state_province')->label('State/province') }}
			{{ Former::sm_text('address.phone')->label('Phone') }}
			{{ Former::sm_text('address.fax')->label('Fax') }}
			{{ Former::sm_text('address.email')->label('Email') }}
			{{ Former::sm_text('address.website')->label('Website') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>

		@if (isset($model))

		<div class="col-sm-4 col-sm-offset-1 related-models-container">

			@include('site/contacts/summary')
			@include('site/venues/summary')
			@include('site/events/summary')
			@include('site/user/summary')

		</div>

		@endif
	</div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop

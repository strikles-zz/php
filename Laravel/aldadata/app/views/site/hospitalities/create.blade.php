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

			{{ Former::legend('Hospitality info') }}
			{{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
			{{ Former::hidden('venue_id') }}
			
			{{ Former::sm_text('first_hotel_option')->useDatalist(Hotel::all(), 'name')->label('Hotel 1')->name('first_hotel_option') }}
			{{ Former::sm_text('first_hotel_distance_from_airport')->label('Distance from airport') }}
			{{ Former::sm_text('second_hotel_option')->useDatalist(Hotel::all(), 'name')->label('Hotel 2')->name('second_hotel_option') }}
			{{ Former::sm_text('second_hotel_distance_from_airport')->label('Distance from airport') }}

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

			{{ Former::close() }}
		</div>
	</div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop
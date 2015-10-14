@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

	@include('notifications')

	{{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('POST')->autocomplete('off') }}
	<div class="row">
		<div class="col-sm-7">

			{{ Former::hidden('id')->value(isset($tickettype) && isset($tickettype->id) ? $tickettype->id : '') }}
			{{ Former::hidden('events_id')->value(isset($event) && isset($event->id) ? $event->id : '') }}

			{{ Former::legend('Ticket Type') }}
			{{ Former::sm_text('name')->label('Name') }}
			{{ Former::sm_text('num_available')->label('Available') }}
			{{ Former::sm_text('price')->label('Price') }}
			{{ Former::sm_text('order')->label('order') }}
			<div class="form-group">
				<label class="control-label col-lg-3 col-sm-4"></label>
				<div class="col-lg-9 col-sm-8">
					<label for="">The order field is used for ordering whilst listing ticket types</label>
				</div>
			</div>

			{{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

		</div>
	</div>
	{{ Former::close() }}

@endsection

@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop



{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			Moneybird Integration
		</h3>

		<a href="{{ URL::to('/admin/integrations/moneybird/sync-contacts') }}">Sync contacts</a>

		{{-- $body --}}
	</div>

@stop
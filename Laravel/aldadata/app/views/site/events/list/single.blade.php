<tr>
	<td width="15"><a href="{{{ URL::to('iframe') }}}" 
					class=" iframe"
					data-type="events"
					data-action="edit"
					data-id="{{ $event->id }}">
				<span class="glyphicon glyphicon-zoom-in"></span></a></td>
	<td>{{ $event->name }}</td>
	<td>{{ $event->date[0]->datetime_start }}</td>
	@if ($event->venues)
	@foreach ($event->venues as $venue)
		<td>{{ $venue->name }}</td>
	@endforeach
	@endif
	<td class="text-right"><input class="rating" value="{{ $event->average_rating }}" data-size="xs" data-min="0" data-max="10" data-step="1" data-disabled="true" data-show-caption="false" data-show-clear="false"></td>
</tr>
{{-- $event --}}
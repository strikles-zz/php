<tr>
	<td width="15"><a href="{{{ URL::to('iframe') }}}" 
					class=" iframe"
					data-type="venues"
					data-action="edit"
					data-id="{{ $venue->id }}">
				<span class="glyphicon glyphicon-zoom-in"></span></a></td>
	<td>{{ $venue->name }}</td>
	<td>{{ $venue->address->country->name }}</td>
	<td>{{ $venue->address->city }}</td>
</tr>
{{-- $venue --}}
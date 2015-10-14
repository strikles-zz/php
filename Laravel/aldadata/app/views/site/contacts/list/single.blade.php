<tr>
	<td width="15"><a href="{{{ URL::to('iframe') }}}" 
					class=" iframe"
					data-type="contacts"
					data-action="edit"
					data-id="{{ $contact->id }}">
				<span class="glyphicon glyphicon-zoom-in"></span></a></td>
	<td>{{ $contact->function }}</td>
	<td>{{ $contact->fullname }}</td>
	<td><a href="mailto:{{ $contact->address->email }}">{{ $contact->address->email }}</a></td>
	<td class="text-right">{{ $contact->address->phone }}</td>
</tr>
{{-- $contact --}}
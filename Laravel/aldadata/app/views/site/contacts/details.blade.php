<div class="row">
	<div class="col-xs-12">
		<h3>{{ $contact->fullname }} <small><a href="{{{ URL::to('iframe') }}}" 
					class=" iframe"
					data-type="contacts"
					data-action="edit"
					data-id="{{ $contact->id }}">
				(edit)</a></small></h3>
	</div>
</div>

<div class="row">

	<div class="col-md-4">
		<legend>Contact details</legend>
		<table class="table table-condensed">
		<tr>
			<td width="100">Type</td><td>{{ $contact->type }}</td>
		</tr>
		<tr>
			<td>First Name:</td><td> {{ $contact->first_name }}</td>
		</tr>
		<tr>
			<td>Last Name:</td><td> {{ $contact->last_name }}</td>
		</tr>
		<tr>
			<td>References:</td><td>{{ $contact->references }}</td>
		</tr>
		<tr>
			<td>Notes:</td><td>{{ $contact->notes }}</td>
		</tr>
		<tr>
			<td>Function:</td><td> {{ $contact->function }}</td>
		</tr>
		</table>

		<legend>Address</legend>
		<table class="table table-condensed">
		<tr>
			<td width="100">Country</td><td>{{ $contact->address->country->name }}</td>
		</tr>
		<tr>
			<td>Address</td><td>{{ $contact->address->address }}</td>
		</tr>
		<tr>
			<td>Postal</td><td>{{ $contact->address->postal }}</td>
		</tr>
		<tr>
			<td>City</td><td>{{ $contact->address->city }}</td>
		</tr>
		<tr>
			<td>Phone:</td><td>{{ $contact->address->phone }}</td>
		</tr>
		<tr>
			<td>Email:</td><td><a href="mailto:{{ $contact->address->email }}">{{ $contact->address->email }}</a></td>
		</tr>
		<tr>
			<td>Website:</td><td><a href="http://{{ $contact->address->website }}" target="_blank">{{ $contact->address->website }}</a></td>
		</tr>
		</table>

	</div>

	<div class="col-md-8">
		<legend>Companies</legend>
		@include ('site/companies/list/index', ['companies' => $contact->companies])

		<legend>Venues</legend>
		@include ('site/venues/list/index', ['venues' => $contact->venues])


	</div>
</div>
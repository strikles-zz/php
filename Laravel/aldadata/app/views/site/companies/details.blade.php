<div class="row">
	<div class="col-xs-12">
		<h3>{{ $company->name }}</h3>
	</div>
</div>

<div class="row">

	<div class="col-md-4">
		<legend>Company details</legend>
		<table class="table table-condensed">
		<tr>
			<td width="100">Type</td><td>{{ $company->type }}</td>
		</tr>
		<tr>
			<td>References</td><td>{{ $company->references }}</td>
		</tr>
		<tr>
			<td>Bank details:</td><td>{{ $company->bank_details }}</td>
		</tr>
		<tr>
			<td>Tax number:</td><td> {{ $company->tax_number }}</td>
		</tr>
		</table>

		<legend>Address</legend>
		<table class="table table-condensed">
		<tr>
			<td width="100">Country</td><td>{{ $company->address->country->name }}</td>
		</tr>
		<tr>
			<td>Address</td><td>{{ $company->address->address }}</td>
		</tr>
		<tr>
			<td>Postal</td><td>{{ $company->address->postal }}</td>
		</tr>
		<tr>
			<td>City</td><td>{{ $company->address->city }}</td>
		</tr>
		<tr>
			<td>Phone:</td><td>{{ $company->address->phone }}</td>
		</tr>
		<tr>
			<td>Email:</td><td><a href="mailto:{{ $company->address->email }}">{{ $company->address->email }}</a></td>
		</tr>
		<tr>
			<td>Website:</td><td><a href="http://{{ $company->address->website }}" target="_blank">{{ $company->address->website }}</a></td>
		</tr>
		</table>

	</div>

	<div class="col-md-8">
		<legend>Contacts</legend>
		@include ('site/contacts/list/index', ['contacts' => $company->contacts])

		<legend>Venues</legend>
		@include ('site/venues/list/index', ['venues' => $company->venues])
		
		<legend>Last 10 Events</legend>
		@include ('site/events/list/index', ['events' => $company->events()->take(10)->get()])		
		

	</div>
</div>
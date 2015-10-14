<div class="row">
	<div class="col-xs-12">
		<h3>{{ $venue->name }}</h3>
	</div>
</div>

<div class="row">

	<div class="col-md-4">
		<legend>venue details</legend>
		<table class="table table-condensed">
		<tr>
			<td width="150">Type</td><td>{{ $venue->indoor_or_outdoor }}</td>
		</tr>
		<tr>
			<td>Name of hall</td><td>{{ $venue->name_of_hall }}</td>
		</tr>
		<tr>
			<td>Capacity:</td><td>{{ $venue->capacity }}</td>
		</tr>
		<tr>
			<td>Height:</td><td>{{ $venue->height }}</td>
		</tr>
		<tr>
			<td>Width:</td><td>{{ $venue->width }}</td>
		</tr>
		<tr>
			<td>Length:</td><td>{{ $venue->length }}</td>
		</tr>
		<tr>
			<td>Rigging capacity:</td><td>{{ $venue->rigging_capacity }}</td>
		</tr>
		<tr>
			<td>Curfew:</td><td>{{ $venue->curfew }}</td>
		</tr>
		<tr>
			<td>Min age limit:</td><td>{{ $venue->minimal_age_limit }}</td>
		</tr>
		<tr>
			<td>Alcohol license:</td><td>{{ $venue->alcohol_license }}</td>
		</tr>
		<tr>
			<td>Restrictions on sales:</td><td>{{ $venue->restrictions_on_merchandise_sales }}</td>
		</tr>
		<tr>
			<td>Sound restrictions:</td><td>{{ $venue->sound_restrictions }}</td>
		</tr>
		<tr>
			<td>Booked for setup from:</td><td>{{ $venue->booked_for_setup_from }}</td>
		</tr>
		<tr>
			<td>Booked for break until:</td><td>{{ $venue->booked_for_break_until }}</td>
		</tr>
		<tr>
			<td>Notes:</td><td>{{ $venue->notes }}</td>
		</tr>
		</table>

		<legend>Address</legend>
		<table class="table table-condensed">
		<tr>
			<td width="100">Country</td><td>{{ $venue->address->country->name }}</td>
		</tr>
		<tr>
			<td>Address</td><td>{{ $venue->address->address }}</td>
		</tr>
		<tr>
			<td>Postal</td><td>{{ $venue->address->postal }}</td>
		</tr>
		<tr>
			<td>City</td><td>{{ $venue->address->city }}</td>
		</tr>
		<tr>
			<td>Phone:</td><td>{{ $venue->address->phone }}</td>
		</tr>
		<tr>
			<td>Email:</td><td><a href="mailto:{{ $venue->address->email }}">{{ $venue->address->email }}</a></td>
		</tr>
		<tr>
			<td>Website:</td><td><a href="http://{{ $venue->address->website }}" target="_blank">{{ $venue->address->website }}</a></td>
		</tr>
		</table>

	</div>

	<div class="col-md-8">
		<legend>Contacts</legend>
		@include ('site/contacts/list/index', ['contacts' => $venue->contacts])
		
		<legend>Companies</legend>
		@include ('site/companies/list/index', ['companies' => $venue->companies])

		<legend>Last 10 Events</legend>
		@include ('site/events/list/index', ['events' => $venue->events()->take(10)->get()])		
		

	</div>
</div>
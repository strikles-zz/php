<table class="table table-condensed">
	@foreach ($contacts as $contact)
		@include ('site/contacts/list/single', $contact)
	@endforeach
</table>
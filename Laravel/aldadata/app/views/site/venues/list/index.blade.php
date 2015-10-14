<table class="table table-condensed">
	@foreach ($venues as $venue)
		@include ('site/venues/list/single', $venue)
	@endforeach
</table>
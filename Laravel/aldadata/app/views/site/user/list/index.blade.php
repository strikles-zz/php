<table class="table table-condensed">
	@foreach ($users as $user)
		@include ('site/users/list/single', $user)
	@endforeach
</table>

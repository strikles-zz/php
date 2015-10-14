<table class="table table-condensed">
	@foreach ($companies as $company)
		@include ('site/companies/list/single', $company)
	@endforeach
</table>
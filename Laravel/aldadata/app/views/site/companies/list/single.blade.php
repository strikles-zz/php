<strong>{{ $company->type }}: {{ $company->name }}</strong>
@foreach ($company->contacts as $contact)
@include ('site/contacts/list/single', $contact)
@endforeach
<dl class="dl-horizontal">
	<dt>id</dt>
	<dd>{{ $company->id }}</dd>

	<dt>Bedrijf</dt>
	<dd>{{ $company->bedrijfsnaam }}</dd>

	<dt>Voornaam</dt>
	<dd>{{ $company->voornaam?: "-" }}</dd>

	<dt>Achternaam</dt>
	<dd>{{ $company->achternaam?: "-" }}</dd>

	<dt>Ter attentie van</dt>
	<dd>{{ $company->ter_attentie_van?: "-" }}</dd>

	<dt>Adres</dt>
	<dd>{{ $company->adres_1?: "-" }} <br /> {{ $company->adres_2?: "-" }}</dd>

	<dt>Postcode</dt>
	<dd>{{ $company->postcode?: "-" }}</dd>

	<dt>Plaats</dt>
	<dd>{{ $company->plaats?: "-" }}</dd>

	<dt>Land</dt>
	<dd>{{ $company->land?: "-" }}</dd>

	<dt>Email</dt>
	<dd>{{ $company->email? '<a href="mailto://' . $company->email . '">' . $company->email . '</a>': "-" }}</dd>

	<dt>Telefoon</dt>
	<dd>{{ $company->telefoon?: "-" }}</dd>

	<dt>BTW nummer</dt>
	<dd>{{ $company->btw_nummer?: "-" }}</dd>

	<dt>KVK nummer</dt>
	<dd>{{ $company->kvk_nummer?: "-" }}</dd>

	<dt>Rekening nummer</dt>
	<dd>{{ $company->rekening_nummer?: "-" }}</dd>
</dl>
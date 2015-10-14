@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

    <div class="container top-gap" id="search-container">

        <div class="bs-example bs-example-tabs">

            <ul id="search-tablist" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#search_companies" role="tab" data-toggle="tab" class="text-center">Companies</a></li>
                <li class=""><a href="#search_venues" role="tab" data-toggle="tab" class="text-center">Venues</a></li>
                <li class=""><a href="#search_contacts" role="tab" data-toggle="tab" class="text-center">Contacts</a></li>
            </ul>

            <div id="myTabContent" class="tab-content top-gap">

                <div class="tab-pane fade active in" id="search_companies">
                    @include('site.search.companies.index')
                </div>
                <div class="tab-pane fade" id="search_venues">
                    @include('site.search.venues.index')
                </div>
                <div class="tab-pane fade" id="search_contacts">
                    @include('site.search.contacts.index')
                </div>

            </div>

        </div>

    </div>

@stop

{{-- Scripts --}}
@section('scripts')
<script id="dt_companies_init" type="text/x-jQuery-tmpl">
{{ $company_init }}
</script>
<script id="dt_venues_init" type="text/x-jQuery-tmpl">
{{ $venue_init }}
</script>
<script id="dt_contacts_init" type="text/x-jQuery-tmpl">
{{ $contact_init }}
</script>

<script type="text/template" id="typeahead-template-country">
    <div><strong><%= datum.value %></strong></div>
</script>

<script type="text/template" id="typeahead-template-city">
    <div><strong><%= datum.value %></strong></div>
</script>

@stop

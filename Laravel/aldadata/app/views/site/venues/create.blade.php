@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

    {{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required'])->method('POST')->autocomplete('off') }}

    <div class="row">

        <div class="col-sm-7">

            {{ Former::legend('Venue info') }}
            {{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
            {{ Former::hidden('company_id') }}
            {{ Former::hidden('contact_id') }}
            {{ Former::hidden('hospitality_id') }}

            {{ Former::sm_text('name')->useDatalist(Venue::all(), 'name')->label('Name')->name('name') }}
            {{ Former::sm_select('indoor_or_outdoor')->options(['indoor', 'outdoor']) }}
            {{ Former::sm_text('name_of_hall') }}
            {{ Former::sm_text('capacity')->data_slider('true')->data_slider_min('500')->data_slider_max('40000')->data_slider_step('500') }}
            {{ Former::sm_text('dimension_height')->input_group()->input_group_label('M') }}
            {{ Former::sm_text('dimension_width')->input_group()->input_group_label('M') }}
            {{ Former::sm_text('dimension_length')->input_group()->input_group_label('M') }}
            {{ Former::sm_text('rigging_capacity')->data_slider('true')->data_slider_min('0')->data_slider_max('2000')->data_slider_step('100')->input_group()->input_group_label('KG') }}
            {{ Former::sm_text('notes') }}

            {{ Former::legend('Address') }}
            {{ Former::sm_text('address.country.name')->useDatalist(Country::all(), 'name')->label('Country')->name('country') }}
            {{ Former::sm_text('address.address')->label('Address') }}
            {{ Former::sm_text('address.postal_code')->label('Postcal code') }}
            {{ Former::sm_text('address.city')->label('City') }}
            {{ Former::sm_text('address.state_province')->label('State/province') }}
            {{ Former::sm_text('address.phone')->label('Phone') }}
            {{ Former::sm_text('address.fax')->label('Fax') }}
            {{ Former::sm_text('address.email')->label('Email') }}
            {{ Former::sm_text('address.website')->label('Website') }}

            {{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}
            {{ Former::close() }}

        </div>

        @if (isset($model))
        <div class="col-sm-4 col-sm-offset-1 related-models-container">

            @include('site/contacts/summary')
            @include('site/companies/summary')
            @include('site/events/summary')

        </div>
        <div class="col-sm-4 col-sm-offset-1 related-pictures-container">
            @include('site/venues/pictures')
        </div>
        @endif

    </div>

@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/template" id="typeahead-template-hotel">
    <div><strong><%= datum.value %> (<%= datum.country %>)</strong></div>
</script>
@stop

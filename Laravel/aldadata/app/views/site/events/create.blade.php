@extends((( Request::ajax()) ? 'site.layouts.ajax' : 'site.layouts.iframe' ))

{{-- Web site Title --}}
@section('title')
    {{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')

    {{ Former::open()->id('MyForm')->secure()->rules(['name' => 'required', 'event_date' => 'required'])->method('POST')->autocomplete('off') }}

    <div class="row">
        <div class="col-sm-7">

            {{ Former::legend('Event info') }}
            {{ Former::hidden('id')->value(isset($model) && isset($model->id) ? $model->id : '') }}
            {{ Former::hidden('contact_id') }}
            {{ Former::hidden('venue_id') }}
            {{ Former::hidden('company_id') }}
            {{ Former::hidden('promoter_id') }}

            {{ Former::sm_text('name') }}
            {{ Former::sm_text('event_date')->date_picker() }}

            {{ Former::sm_text('proposed_opening_time')->time_picker('time') }}
            {{ Former::sm_text('proposed_closing_time')->time_picker('time') }}
            {{ Former::sm_textarea('proposed_local_sponsors') }}
            {{ Former::sm_textarea('promotional_activities') }}

            {{ Former::legend("Venue details ") }}
            {{ Former::sm_text('curfew')->time_picker('time') }}

            {{ Former::sm_text('minimal_age_limit') }}
            {{ Former::sm_text('alcohol_license') }}
            {{ Former::sm_text('restrictions_on_merchandise_sales') }}
            {{ Former::sm_text('sound_restrictions') }}
            {{ Former::sm_text('booked_for_setup_from')->date_picker() }}
            {{ Former::sm_text('booked_for_break_until')->date_picker() }}

            {{ Former::legend('Hospitality info') }}
            <div class="row"><div class="col-lg-3 col-sm-4"></div><div class="col-lg-9 col-sm-8"><strong><p class="help-block">First hotel option</p></strong></div></div>
            {{ Former::sm_text('hotel1_name')->label('Name') }}
            {{ Former::sm_text('hotel1_website')->label('Website') }}
            {{ Former::sm_text('hotel1_travel_time_from_airport')->label('Travel Time to airport')->input_group()->input_group_label('Minutes') }}
            {{ Former::sm_text('hotel1_travel_time_from_venue')->label('Travel Time to venue')->input_group()->input_group_label('Minutes') }}
            <div class="row"><div class="col-lg-3 col-sm-4"></div><div class="col-lg-9 col-sm-8"><strong><p class="help-block">Second hotel option</p></strong></div></div>
            {{ Former::sm_text('hotel2_name')->label('Name') }}
            {{ Former::sm_text('hotel2_website')->label('Website') }}
            {{ Former::sm_text('hotel2_travel_time_from_airport')->label('Travel Time to airport')->input_group()->input_group_label('Minutes') }}
            {{ Former::sm_text('hotel2_travel_time_from_venue')->label('Travel Time to venue')->input_group()->input_group_label('Minutes') }}

            @if (isset($model) && $model->event_date < date('Y-m-d', time()))
            {{ Former::legend('Ratings') }}
            {{ Former::sm_text('eval_financial_score')->label('Financial Rating')->class('rating')->data_max('10')->data_step('1')->data_size('xs') }}
            {{ Former::sm_textarea('eval_financial_text')->label('Financial Remarks') }}
            {{ Former::sm_text('eval_marketing_score')->label('Marketing Rating')->class('rating')->data_max('10')->data_step('1')->data_size('xs') }}
            {{ Former::sm_textarea('eval_marketing_text')->label('Marketing Remarks') }}
            {{ Former::sm_text('eval_travel_score')->label('Travel Rating')->class('rating')->data_max('10')->data_step('1')->data_size('xs') }}
            {{ Former::sm_textarea('eval_travel_text')->label('Travel Remarks') }}
            {{ Former::sm_text('eval_production_score')->label('Production Rating')->class('rating')->data_max('10')->data_step('1')->data_size('xs') }}
            {{ Former::sm_textarea('eval_production_text')->label('Production Remarks') }}

            {{ Former::sm_textarea('eval_financial_extra')->label('Extra Remarks') }}
            @endif

            {{ Former::legend('Ticket info') }}
            {{ Former::checkbox('ticketsystem_enabled')->label('Enable Ticketsystem') }}
            {{ Former::select('currency_id')->fromQuery(Currency::all(), 'code', 'id')->value(isset($model) ? $model->currency_id : 34)->label('Currency') }}
            {{ Former::sm_text('ticketsystem_recording_startdate')->value(isset($model) && $model->ticketsystem_recording_startdate ? $model->ticketsystem_recording_startdate : date('Y-m-d', strtotime('now')))->date_picker()
            }}

            @if(isset($model) && count($model->promoters()) > 0)
            {{ Former::checkbox('ticketsystem_locked_for_promoter')->label('Locked For promoter') }}
            {{ Former::checkbox('ticketsystem_autoremind')->label('Autosend Reminder') }}
            {{ Former::select('ticketsystem_autoremind_user_id')->fromQuery($model->users()->get(), 'username', 'id')->label('Send Reminder to user')  }}
            @endif

            {{ Former::actions()->large_primary_black_submit('Save')->large_inverse_reset('Reset') }}

            {{ Former::close() }}
        </div>

        @if (isset($model) && $model->event_date < date('Y-m-d', time()))
        <script>(function($) {
            'use strict';
            $('.rating').rating({
                starCaptions: {
                    1: 'Half Star',
                    2: 'One Star',
                    3: 'One & Half Star',
                    4: 'Two Stars',
                    5: 'Two & Half Stars',
                    6: 'Three Stars',
                    7: 'Three & Half Stars',
                    8: 'Four Stars',
                    9: 'Four & Half Stars',
                    10: 'Five Stars'
                }
            });

        })(jQuery);</script>
        @endif

        @if (isset($model))
        <div class="col-sm-4 col-sm-offset-1 related-models-container">
            @include('site/contacts/summary')
            @include('site/venues/summary')
            @include('site/companies/summary')
            @include('site/user/summary')
            @include('site/tickets/types/summary')
        </div>
        @endif
    </div>

@stop

{{-- Scripts --}}
@section('scripts')

@stop

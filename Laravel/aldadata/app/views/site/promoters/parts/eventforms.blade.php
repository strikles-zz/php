<script type="text/ng-template" id="event_details.html">

    <div id="container eventsDetailsContainer">
        <div class="row">
            <div class="col-xs-12">

                <div class="container">

                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-offset-0">

                            <button title="Dashboard" class="details-btn-sel" ng-click="selectEventView('form.dashboard');$root.active_dashboard_btn=true;" ng-class="$root.active_dashboard_btn ? 'active' : ''">
                                <span class="fa fa-list"></span>
                            </button>
                            <button title="Venue Details" class="details-btn-sel" ng-click="selectEventView('form.event_venue');$root.active_venue_btn=true;" ng-class="$root.active_venue_btn ? 'active' : ''">
                                <span class="fa fa-institution"></span>
                            </button>
                            <button title="Event Details" class="details-btn-sel" ng-click="selectEventView('form.event_hospitality');$root.active_event_btn=true;" ng-class="$root.active_event_btn ? 'active' : ''">
                                <span class="fa fa-plane"></span>
                            </button>
                            <button title="Event Ticket Sales" class="details-btn-sel" ng-click="selectEventView('form.tickets');$root.active_tickets_btn=true;" ng-show="promoter_events[$root.event_ndx].ticket_types.length" ng-class="$root.active_tickets_btn ? 'active' : ''">
                                <span class="fa fa-ticket"></span>
                            </button>

                        </div>
                    </div>

                    <div class="event_details_content row" style="margin-top: 20px;">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 event_details_shadow">
                            <div class="event_details_views" ui-view></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</script>



<script type="text/ng-template" id="venue.html">

    <h4 class="text-center">Event Details</h4>
    <p class="text-center">Please enter your event company details</p>
    <form name="venueForm" class="form-horizontal" role="form" novalidate>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.curfew.$invalid}">
                <label for="curfew" class="col-xs-6 control-label">Curfew</label>
                <div class="col-xs-6">
                    <timepicker-pop input-time="venueData.curfew" show-meridian="true" required></timepicker>
                    <span class="help-block" ng-show="venueForm.curfew.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.minimal_age_limit.$invalid}">
                <label for="minimal_age_limit" class="col-xs-6 control-label">Minimal Age</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="minimal_age_limit" ng-model="venueData.minimal_age_limit" required>
                    <span class="help-block" ng-show="venueForm.minimal_age_limit.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.alcohol_license.$invalid}">
                <label for="alcohol_license" class="col-xs-6 control-label">Alcohol License</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="alcohol_license" ng-model="venueData.alcohol_license" required>
                    <span class="help-block" ng-show="venueForm.alcohol_license.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.restrictions_on_merchandise_sales.$invalid}">
                <label for="restrictions_on_merchandise_sales" class="col-xs-6 control-label">Merchandise Restrictions</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="restrictions_on_merchandise_sales" ng-model="venueData.restrictions_on_merchandise_sales" required>
                    <span class="help-block" ng-show="venueForm.restrictions_on_merchandise_sales.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.sound_restrictions.$invalid}">
                <label for="sound_restrictions" class="col-xs-6 control-label">Sound Restrictions</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control" name="sound_restrictions" ng-model="venueData.sound_restrictions" required>
                    <span class="help-block" ng-show="venueForm.sound_restrictions.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.booked_for_setup_from.$invalid}">
                <label for="booked_for_setup_from" class="col-xs-6 control-label">Booked For Setup From</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control truncate" ng-model="venueData.booked_for_setup_from" ng-required="true" ng-click="eventform_datepicker_open = true;" sdatepicker></input>
                    <span class="help-block" ng-show="venueForm.booked_for_setup_from.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': venueForm.booked_for_break_until.$invalid}">
                <label for="booked_for_break_until" class="col-xs-6 control-label">Booked For Break Until</label>
                <div class="col-xs-6">
                    <input type="text" class="form-control truncate" ng-model="venueData.booked_for_break_until" ng-required="true" ng-click="eventform_datepicker_open = true;" sdatepicker></input>
                    <span class="help-block" ng-show="venueForm.booked_for_break_until.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="form-group row registration_buttons top-gap">
            <div class="col-xs-5"></div>
            <div class="col-xs-2"></div>
            <div class="col-xs-5">
                <a ng-click="registrationSubmission('venue', 'form.event_hospitality')" class="btn btn-block form-btn registration_next" ng-disabled="venueForm.$invalid">
                Next <span></span>
                </a>
            </div>
        </div>
    </form>
</script>



<script type="text/ng-template" id="hospitality.html">

    <h4 class="text-center">Hospitality Details</h4>
    <p class="text-center">Please enter your event hospitality details if available</p>

    <form name="hospitalityForm" class="form-horizontal" role="form" novalidate>

        <legend>First Hotel</legend>
        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel1_name.$invalid}">
                <label for="hotel1_name" class="col-xs-3 control-label">Name</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel1_name" ng-model="hospitalityData.hotel1_name" ng-init="hospitalityData.hotel1_name = promoter_events[$root.event_ndx].event.hotel1_name">
                    <span class="help-block" ng-show="hospitalityForm.hotel1_name.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel1_website.$invalid}">
                <label for="hotel1_website" class="col-xs-3 control-label">Website</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel1_website" ng-model="hospitalityData.hotel1_website" ng-init="hospitalityData.hotel1_website = promoter_events[$root.event_ndx].event.hotel1_website">
                    <span class="help-block" ng-show="hospitalityForm.hotel1_website.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel1_travel_time_from_airport.$invalid}">
                <label for="hotel1_travel_time_from_airport" class="col-xs-3 control-label">Airport Traveltime </label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel1_travel_time_from_airport" ng-model="hospitalityData.hotel1_travel_time_from_airport" ng-init="hospitalityData.hotel1_travel_time_from_airport = promoter_events[$root.event_ndx].event.hotel1_travel_time_from_airport">
                    <span class="help-block" ng-show="hospitalityForm.hotel1_travel_time_from_airport.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel1_travel_time_from_venue.$invalid}">
                <label for="hotel1_travel_time_from_venue" class="col-xs-3 control-label">Venue Traveltime</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel1_travel_time_from_venue" ng-model="hospitalityData.hotel1_travel_time_from_venue" ng-init="hospitalityData.hotel1_travel_time_from_venue = promoter_events[$root.event_ndx].event.hotel1_travel_time_from_venue">
                    <span class="help-block" ng-show="hospitalityForm.hotel1_travel_time_from_venue.$invalid">*</span>
                </div>
            </div>
        </div>

        <legend>Second Hotel</legend>
        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel2_name.$invalid}">
                <label for="hotel2_name" class="col-xs-3 control-label">Name</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel2_name" ng-model="hospitalityData.hotel2_name" ng-init="hospitalityData.hotel2_name = promoter_events[$root.event_ndx].event.hotel2_name">
                    <span class="help-block" ng-show="hospitalityForm.hotel2_name.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel2_website.$invalid}">
                <label for="hotel2_website" class="col-xs-3 control-label">Website</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel2_website" ng-model="hospitalityData.hotel2_website" ng-init="hospitalityData.hotel2_website = promoter_events[$root.event_ndx].event.hotel2_website">
                    <span class="help-block" ng-show="hospitalityForm.hotel2_website.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel2_travel_time_from_airport.$invalid}">
                <label for="hotel2_travel_time_from_airport" class="col-xs-3 control-label">Airport Traveltime</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel2_travel_time_from_airport" ng-model="hospitalityData.hotel2_travel_time_from_airport" ng-init="hospitalityData.hotel2_travel_time_from_airport = promoter_events[$root.event_ndx].event.hotel2_travel_time_from_airport">
                    <span class="help-block" ng-show="hospitalityForm.hotel2_travel_time_from_airport.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="row top-gap-xs">
            <div class="form-group" ng-class="{'has-error': hospitalityForm.hotel2_travel_time_from_venue.$invalid}">
                <label for="hotel2_travel_time_from_venue" class="col-xs-3 control-label">Venue Traveltime</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" name="hotel2_travel_time_from_venue" ng-model="hospitalityData.hotel2_travel_time_from_venue" ng-init="hospitalityData.hotel2_travel_time_from_venue = promoter_events[$root.event_ndx].event.hotel2_travel_time_from_venue">
                    <span class="help-block" ng-show="hospitalityForm.hotel2_travel_time_from_venue.$invalid">*</span>
                </div>
            </div>
        </div>

        <div class="form-group row top-gap registration_buttons">
            <div class="col-xs-5">
                <a ng-click="goBack('hospitality', 'form.event_venue')" class="btn btn-block form-btn registration_prev">
                <span></span> Previous
                </a>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-5">
                <a ng-click="registrationSubmission('hospitality', 'form.dashboard')" class="btn btn-block form-btn registration_next" ng-disabled="hospitalityForm.$invalid">
                Finish <span></span>
                </a>
            </div>
        </div>
    </form>

</script>
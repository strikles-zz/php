<script type="text/ng-template" id="events_buttons.html">

    <div class="button_events">
        <div class="container">

            <div class="loop" ng-repeat="ev in $root.promoter_events | orderBy: 'due_date' | unique: 'event.id'">
                @if(Auth::user()->hasRole('promoter'))
                <div class="event_entry" ng-click="selectEventView('form.dashboard', ev.event.id)">
                @else
                <div class="event_entry" ng-click="aldaSelectEventView('form.dashboard', ev.event.id)">
                @endif
                    <div class="event_date truncate row" ng-bind="str2Date(ev.details.date) | date:'dd MMM yyyy' | uppercase"></div>
                    <button title="Event Details" class="event_details_btn" ui-sref-active="active" ng-click="selectEventView('form.event_venue', ev.event.id)"><span class="fa fa-cog" aria-hidden="true"></span></button>
                    <button title="Event Ticket Sales" class="event_tickets_btn" ui-sref-active="active" ng-click="selectEventView('form.tickets', ev.event.id)" ng-show="ev.ticket_types.length > 0"><span class="fa fa-ticket" aria-hidden="true"></span></button>
                    <div class="event_content">
                        <div class="event_name truncate row" ng-bind="ev.event.name"></div>
                        <div class="event_location truncate row" ng-bind="ev.details.location"></div>
                        <div class="event_deadline truncate row" ng-bind="str2Date(ev.details.deadline) | date:'dd MMM'" ng-class="getEventDeadlineClass(details.deadline)"></div>
                        <div class="event_deadline_header truncate row">Next Deadline</div>
                        <div class="event_completion_bar">
                            <div ng-style="getEventCompletionCSS(ev)"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="noevents" ng-hide="!$root.promoter_events || $root.promoter_events.length > 0">You have no planned events</div>
            <div class="events_loading" ng-show="!$root.promoter_events">Loading...</div>
        </div>
    </div>

</script>



<script type="text/ng-template" id="events_rows.html">

    <div class="row_events">

        <div class="container desc">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-2 desc_date truncate">Date</div>
                        <div class="col-xs-2 desc_name truncate">Name</div>
                        <div class="col-xs-2 desc_loc truncate">Location</div>
                        <div class="col-xs-2 desc_due truncate">Due</div>
                        <div class="col-xs-2 desc_completion truncate">Completion</div>
                        <div class="col-xs-2 desc_updates truncate text-right">Updates</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="entry_container" ng-repeat="ev in $root.promoter_events | orderBy: 'due_date' | unique: 'event.id'">
            <div class="entry container" ng-click="selectEventView('form.dashboard', ev.event.id)" ng-class="getEventDeadlineClass(ev.details.deadline)">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="revent_date col-xs-2 truncate" ng-bind="str2Date(ev.details.date) | date:'dd MMM yyyy'"></div>
                            <div class="revent_name col-xs-2 truncate" ng-bind="ev.event.name"></div>
                            <div class="revent_location col-xs-2 truncate" ng-bind="ev.details.location"></div>
                            <div class="revent_deadline col-xs-2 truncate" ng-bind="str2Date(ev.details.deadline) | date:'dd MMM yyyy'"></div>
                            <div class="revent_completion col-xs-2 truncate" ng-bind="getEventCompletionString(ev)"></div>
                            <div class="revent-updates col-xs-2">
                                <div class="files_badge pull-right" style="display: inline-block; position: relative; min-width: 30px;" ng-show="ev.updated_comments > 0"><span class="fa-stack-1x"><i class="fa fa-comment fa-stack-2x"></i><strong class="fa-stack-1x badge-update-text">@{{ ev.updated_comments }}</strong></span></div>
                                <div class="comments_badge pull-right" style="display: inline-block; position: relative; min-width: 30px;" ng-show="ev.updated_files > 0"><span class="fa-stack-1x"><i class="fa fa-file fa-stack-2x"></i><strong class="fa-stack-1x badge-update-text">@{{ ev.updated_files }}</strong></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="noevents" ng-hide="!$root.promoter_events || $root.promoter_events.length > 0">You have no planned events</div>
            <div class="events_loading" ng-show="!$root.promoter_events">Loading...</div>
        </div>
    </div>

</script>



<script type="text/ng-template" id="events.html">

    <div id="container eventsContainer">

        @if (!Auth::guest() && !Auth::user()->hasRole('promoter'))
        <div class="container events_view_sel">
            <div class="row">

                <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button class="view-sel list-sel pull-right" ui-sref-active="active" ui-sref="form.events.rows" ng-click="show_rows=true; show_buttons=false;"><span class="fa fa-th-list"></span></button>
                            <button class="view-sel btn-sel pull-right" ui-sref-active="active" ui-sref="form.events.buttons" ng-click="show_rows=false; show_buttons=true;"><span class="fa fa-th"></span></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif

        <div class="event_content" style="margin-top: 25px;">
            <div class="event-views" ui-view></div>
        </div>
    </div>

</script>

<script type="text/ng-template" id="tickets.html">

    <div class="tickets" id="ticketsRoot" data-token="<?php echo Session::getToken();?>" ng-controller="TicketController">

        <div class="no-tickettypes" ng-hide="!$root.promoter_events.length || $root.promoter_events[$root.event_ndx].ticket_types.length">
            <div class="row">
                <div class="col-xs-12">
                    <h4 class="text-center">There are no ticket types defined for the current Event</h4>
                    <p><a href="mailto:andre@eenvoudmedia.nl?subject=No Ticket Types">Contact Alda</a></p>
                </div>
            </div>
        </div>

        <div class="container tickets-wrapper" ng-show="$root.promoter_events.length && $root.promoter_events[$root.event_ndx].ticket_types.length">

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
                    <button title="Event Ticket Sales" class="details-btn-sel" ng-click="selectEventView('form.tickets');$root.active_tickets_btn=true;" ng-show="$root.promoter_events[$root.event_ndx].ticket_types.length" ng-class="$root.active_tickets_btn ? 'active' : ''">
                        <span class="fa fa-ticket"></span>
                    </button>

                </div>
            </div>

            <!-- Promoters -->
            @if(Auth::user()->hasRole('promoter'))

            <!-- Header -->
            <div id="promoterTickets"  style="margin-top: 20px;">

                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">

                        <div class="row sized-header-row">

                            <div class="col-xs-3 text-left" ng-init="setupLastWeeks()">
                                <div class="row">
                                    <div class="col-xs-8 no-wrap">
                                        <button ng-click="promotersPrevWeek()" class="action-btn"><span class="fa fa-chevron-left"></span></button>
                                        <button ng-click="promotersNextWeek()" class="action-btn"><span class="fa fa-chevron-right"></span></button>
                                    </div>
                                    <div class="col-xs-4 header-label truncate">Week</div>
                                </div>
                            </div>

                            <div class="col-xs-7">
                                <div class="row">
                                    <div class="col-xs-2 text-right header-label truncate" ng-repeat="week in last_n_weeks">@{{ week.week_ndx }} <span class="entry-year">@{{ week.year }}</span></div>
                                </div>
                            </div>

                            <div class="col-xs-2 text-right header-label truncate">Available</div>

                        </div>

                        <div class="row" ng-show="$root.promoter_events !== undefined && $root.promoter_events.length > 0 && last_n_weeks.length === 0">
                            <div class="col-xs-12">
                                <h4>Sales can be entered in a week</h4>
                                <p><a href="mailto:andre@eenvoudmedia.nl?subject=No time elapsed">Contact Alda</a></p>
                            </div>
                        </div>

                        <div class="row" id="promoter_sales_form" ng-show="last_n_weeks.length">

                            <div class="col-xs-3 text-left">
                                <div class="row entry-row sized-row" ng-repeat="tt in $root.promoter_events[$root.event_ndx].ticket_types">
                                    <div class="col-xs-12" ng-bind="tt.name"></div>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="row entry-row sized-row" ng-repeat="tt in $root.promoter_events[$root.event_ndx].ticket_types">
                                    <div class="col-xs-2" ng-repeat="week in last_n_weeks">
                                        <div ng-hide="h = conditionalInput(tt, week)" class="text-right">@{{ echoNumSold(tt, week) }}</div>
                                        <input ng-show="s = conditionalInput(tt, week)" type="text" data-ttype="@{{ tt.id }}" data-week="@{{ week.week_ndx }}" data-year="@{{ week.year }}" class="text-right" style="max-width: 100%" ng-pattern="onlyNumbers">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-right available-col">
                                <div class="row entry-row sized-row" ng-repeat="tt in $root.promoter_events[$root.event_ndx].ticket_types">
                                    <div class="col-xs-12 truncate" ng-bind="tt.num_available"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row" ng-show="last_n_weeks.length">
                            <div class="col-xs-8"></div>
                            <div class="col-xs-4">
                                <button class="pull-right save-btn action-btn top-gap" ng-click="submitWeeklyTickets('promoter')">Save <span class="fa fa-check"></span></button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Alda -->
            @else

            <div id="aldaTickets" style="margin-top: 20px;">

                <div class="row">
                    <!-- Left weekly entries -->
                    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 tickets-weekly-entries">

                        <div class="col-xs-12 headers-left">
                            <!-- left header -->
                            <div class="row sized-header-row">
                                <div class="col-xs-2 header-label">Week</div>
                                <div class="col-xs-10">
                                    <div class="row">
                                        <div class="col-xs-6 header-label">Ticket Type</div>
                                        <div class="col-xs-3 header-label text-right">Sold</div>
                                        <div class="col-xs-3 header-label text-right">Amount</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- weekly entry -->
                        <div class="row we-row" ng-repeat="week in $root.promoter_events[$root.event_ndx].tickets | reverse">

                            <div class="weekly-tickets-form" id="@{{ 'weekly_sales_'+week.week_ndx+'_'+week.year }}">

                                <div class="col-xs-2 week-col">
                                    <div class="row sized-row">
                                        <div class="col-xs-12 header-label">@{{ week.week_ndx }} <span class="entry-year">@{{ week.year }}</span></div>
                                    </div>
                                    <div class="row sized-row">
                                        <div class="col-xs-12">
                                            <button class="week-action-btn" ng-click="weeklyAction(week.week_ndx, week.year)">
                                                <span ng-hide="editor_expanded[week.week_ndx]" class="span_btn truncate fa fa-pencil"></span>
                                                <span ng-show="editor_expanded[week.week_ndx]" class="span_btn truncate fa fa-save"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-10 week_entry">

                                    <!-- weekly totals -->
                                    <div class="row sized-row total-row">
                                        <div class="col-xs-6 header-label">Total</div>
                                        <div class="col-xs-3 text-right header-label" ng-bind="week.weekly_totals.num_sold"></div>
                                        <div class="col-xs-3 text-right header-label">@{{ getCurrency()+' '+week.weekly_totals.amt }}</div>
                                    </div>

                                    <!-- weekly individual entries -->
                                    <div class="row sized-row entry-row" ng-repeat="tt in week.ticket_details">
                                        <div class="col-xs-6" ng-bind="tt.ticket_type.name"></div>

                                        <!-- show -->
                                        <div class="col-xs-3 text-right" ng-hide="editor_expanded[week.week_ndx]">@{{ tt.tickets_sold ? tt.tickets_sold.num_sold : 0 }}</div>
                                        <!-- edit -->
                                        <input type="text" class="col-xs-3" name="num_sold" ng-show="editor_expanded[week.week_ndx]" ng-value="@{{ tt.tickets_sold ? tt.tickets_sold.num_sold : 0 }}" data-ttype="@{{ tt.ticket_type.id }}" data-week="@{{ week.week_ndx }}" data-year="@{{ week.year }}" ng-pattern="onlyNumbers">

                                        <div class="col-xs-3 text-right">@{{ getCurrency()+' '+(tt.tickets_sold ? tt.tickets_sold.num_sold*tt.ticket_type.price : 0) }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Right yearly entries -->
                    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 tickets-totals">

                        <div class="col-xs-12 headers-right">
                            <div class="row sized-header-row">
                                <div class="col-xs-6 header-label">Ticket Totals</div>
                                <div class="col-xs-3 header-label text-right">Sold</div>
                                <div class="col-xs-3 header-label text-right">Amount</div>
                            </div>
                        </div>

                        <!-- yearly totals -->
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="row sized-row entry-row" ng-repeat="ytt in $root.promoter_events[$root.event_ndx].tickets_yearly">
                                    <div class="col-xs-6" ng-bind="ytt.name"></div>
                                    <div class="col-xs-3 text-right" ng-bind="ytt.num_sold"></div>
                                    <div class="col-xs-3 text-right">@{{ getCurrency()+' '+ytt.amt }}</div>
                                </div>

                            </div>
                        </div>

                        <!-- grand total -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row sized-row grand-total-row">
                                    <div class="col-xs-6 header-label">Total</div>
                                    <div class="col-xs-3 header-label text-right" ng-bind="grand_total_cnt"></div>
                                    <div class="col-xs-3 header-label text-right">@{{ getCurrency()+' '+grand_total_amt }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- highcharts plot -->
                        <div class="row">
                            <div class="col-xs-12" style="position: relative;">
                                <div id="hccontainer" style="position: absolute; left: 0; right: 0; top: 0; max-height:400px; margin-top: 50px;"></div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            @endif

        </div>
    </div>

</script>

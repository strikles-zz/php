<script type="text/ng-template" id="form.html">

    <div class="backdrop" style="display:none;z-index:1025;position:absolute;top:0;right:0;bottom:0;left:0;opacity:0.5;background: white url(/assets/img/loading.gif) center center no-repeat;"></div>

    <div class="row" ng-controller="PromoterController">

        <div class="col-xs-12">
            <div class="form-container">


                <div class="page-header text-center row">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-7 truncate">
                                <h2 class="breadcrumbs" ng-show="$state.current.name === 'form.events.buttons' || $state.current.name === 'form.events.rows'">Events</h2>
                                <div class="breadcrumbs truncate" ng-hide="$state.current.name === 'form.events.buttons' || $state.current.name === 'form.events.rows'">
                                    <h2 class="event-prefix">
                                        <div style="display: inline-block; max-width:200px;" class="truncate hidden-xs">@{{ $root.promoter_events[$root.event_ndx].event.name }}</div>
                                        <div class="chev-right hidden-xs" style="display: inline-block; margin-top: -2px;"></div>
                                        <div class="active_partial truncate" style="display: inline-block;">@{{ getSName() }}</div>
                                    </h2>
                                </div>
                            </div>
                            <div class="col-xs-5 pull-right truncate">
                                <h2 ng-hide="$state.current.name === 'form.all' || $state.current.name === 'form.tickets'" style="text-align: right !important"><span class="remaining_tasks">@{{ tasksRemaining() }}</span> Remaining Tasks</h2>
                                <h2 ng-show="$state.current.name === 'form.tickets'" style="text-align: right !important" class="curr_date" ng-bind="$root.today | date:'dd MMMM yyyy'"></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content_host row">
                    <div class="signup-form">
                        <div class="form-views" ui-view></div>
                    </div>
                </div>

                <div class="status-buttons row" ng-show="showStatusBtns()">
                    <div class="container">

                        <div class="col-xs-2 sm-pad text-center">
                            @if (Auth::user()->hasRole("promoter"))
                            <button ui-sref-active="active" ng-click="selectEventView('form.events.buttons')">
                            @else
                            <button ui-sref-active="active" ng-click="selectEventView('form.events.rows')">
                            @endif
                                <div class="row task_menu truncate">Events</div>
                                <div class="row">&nbsp;</div>
                            </button>
                        </div>

                        <div class="col-xs-2 sm-pad text-center">
                            <button ui-sref-active="active" ng-click="selectEventView('form.dashboard')">
                                <div class="row task_menu truncate">Overview</div>
                                <div class="row dashboard_row">
                                    <div class="col-xs-12">
                                        <span class="fa fa-list dashboard_btn"></span>
                                    </div>
                                </div>
                                <div class="row gcb">
                                    <div class="group_completion_bar">
                                        <div ng-style="getEventCompletionCSS($root.promoter_events[$root.event_ndx])"></div>
                                    </div>
                                </div>
                            </button>
                        </div>

                        <div class="col-xs-2 sm-pad text-center" ng-repeat="tg in $root.promoter_events[$root.event_ndx].details.data">
                            <button ui-sref-active="active" ng-click="selectEventView('form.group'+tg.id)">
                                <div class="row task_menu truncate" ng-bind="tg.name"></div>
                                <div class="row task_completion truncate">@{{ tg.completed }}<span class="completion_total"> / @{{ tg.total }}</span></div>
                                <div class="row gcb">
                                    <div class="group_completion_bar">
                                        <div ng-style="getCompletionBarCSS(tg)"></div>
                                    </div>
                                </div>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</script>

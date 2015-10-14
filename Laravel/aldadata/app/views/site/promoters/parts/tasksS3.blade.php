<script type="text/ng-template" id="masters3.html">

    <div class="promoter_events" style="margin-bottom: 110px !important;">

        <div ng-show="$root.invalid_event_id">
            <h2 class="text-center">Invalid Event selected</h2>
        </div>

        <div ng-hide="$root.invalid_event_id">
            <div class="container desc">

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

                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12">

                        <div class="row">
                            <div class="col-xs-1 desc_type truncate">Type</div>

                            @if (Auth::user()->hasRole("promoter"))
                            <div class="col-xs-4 desc_desc truncate">Description</div>
                            @else
                            <div class="col-xs-3 desc_desc truncate">Description</div>
                            @endif

                            <div class="col-xs-2 desc_due truncate">Due</div>
                            <div class="col-xs-2 desc_remaining truncate">Remaining</div>

                            @if (Auth::user()->hasRole("User") || Auth::user()->hasRole("admin"))
                            <div class="col-xs-1 truncate">Active</div>
                            @endif

                            <div class="col-xs-1 truncate">Status</div>
                            <div class="col-xs-2 truncate text-right">Updates</div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="entry_container" ng-controller="TaskController" ng-repeat="task in %GROUP_TASKS% | orderBy:['-info.status','info.due_date'] %LIMIT_FILTER%" ng-init="setItask(task)">

                <div id="task_@{{ task.info.id }}" ng-file-drop ng-model="ufiles" drag-over-class="dragover" ng-multiple="true" allow-dir="true" ng-init='s3 = {policy: "{{{ $policy }}}", signature: "{{{ $signature }}}" }'>


                    @if (Auth::user()->hasRole("promoter"))
                    <div class="entry container" ng-class="getDeadlineClass(task.info.due_date)" ng-style="getTaskOpacity(task.info.status)" ng-click="toggleDetails(task);" ng-init="completion_status = (task.info.status === 'complete'); active_status = (task.info.active === 1 || task.info.active === '1')" ng-hide="!task.info.active">
                    @else
                    <div class="entry container" ng-class="getDeadlineClass(task.info.due_date)" ng-style="getTaskOpacity(task.info.status)" ng-click="toggleDetails(task);" ng-init="completion_status = (task.info.status === 'complete'); active_status = (task.info.active === 1 || task.info.active === '1')">
                    @endif

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-1 desc_type truncate">@{{ catName(task.info.group_id) }}</div>

                                    @if (Auth::user()->hasRole("promoter"))
                                    <div class="col-xs-4 desc_desc truncate" ng-bind="task.info.title"></div>
                                    @else
                                    <div class="col-xs-3 desc_desc truncate" ng-bind="task.info.title"></div>
                                    @endif

                                    @if (Auth::user()->hasRole("promoter"))
                                    <div class="col-xs-2 desc_due truncate" ng-bind="task.info.due_date"></div>
                                    @else
                                    <input type="text" class="col-xs-2 desc_due truncate" ng-model="dt" ng-init="dt = task.info.due_date" ng-click="datepicker_open = true;" edatepicker></input>
                                    @endif

                                    <div class="col-xs-2 desc_remaining truncate">@{{ task.info.deadline_days_gap === "0" ? "" : daysLeft(task.info.due_date)+" days" }}</div>

                                    @if (Auth::user()->hasRole("promoter"))
                                    <div class="col-xs-1" ng-bind="task.info.status"></div>
                                    @else
                                    <div class="col-xs-1">
                                        <input type="checkbox" ng-click="setActive($event)" ng-model="active_status" ng-checked="active_status">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="checkbox" ng-click="setStatus($event)" ng-model="completion_status" ng-checked="completion_status">
                                    </div>
                                    @endif

                                    <div class="col-xs-2 task-updates" ng-hide="task.info.status === 'complete'">
                                        <div class="badge comments_badge pull-right" style="display: inline-block; position: relative; min-width: 30px;" ng-show="task.info.cnt_updated_comments > 0" ng-class="getBadgeCSS($root.promoter_events[$root.event_ndx].logged_in_id, task.info.updated_by)"><span class="fa-stack-1x"><i class="fa fa-comment fa-stack-2x"></i><strong class="fa-stack-1x badge-update-text">@{{ task.info.cnt_updated_comments }}</strong></span></div>
                                        <div class="badge files_badge pull-right" style="display: inline-block; position: relative; min-width: 30px;" ng-show="task.info.cnt_updated_files > 0" ng-class="getBadgeCSS($root.promoter_events[$root.event_ndx].logged_in_id, task.info.updated_by)"><span class="fa-stack-1x"><i class="fa fa-file fa-stack-2x"></i><strong class="fa-stack-1x badge-update-text">@{{ task.info.cnt_updated_files }}</strong></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container-fluid">
                        <div class="row entry_details">
                            <div class="entry_details_container col-xs-12">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-8 taskfile">

                                            <div class="row desc_details">
                                                <div class="col-xs-2 truncate">Date</div>
                                                <div class="col-xs-2 truncate">User</div>
                                                <div class="col-xs-6 truncate">Filename</div>
                                                <div class="col-xs-2 truncate text-right">Actions</div>
                                            </div>

                                            <div ng-repeat="file in task.files  | orderBy:'updated_at':true">
                                                <div class="row taskfile_entry">

                                                    <div class="col-xs-2 truncate">@{{ file.updated_at.split(" ")[0] }}</div>
                                                    <div class="col-xs-2 truncate" ng-bind="file.username"></div>
                                                    <div class="col-xs-6 truncate"><a href="" ng-click="downloadFile(file.id)" download="@{{file.original_filename}}" target="_blank" class="file_download_url">@{{ file.original_filename }}</a></div>
                                                    <div class="col-xs-2 file_actions">
                                                        @if (Auth::user()->hasRole('promoter'))
                                                        <a href="" ng-click="deleteFile(file, task.info.id)" target="_blank" class="pull-right" ng-show="userCreatedFile($root.promoter_events[$root.event_ndx].logged_in_id, file.users_id, task.info.status)">
                                                            <span class="file_delete"></span>
                                                        </a>
                                                        @else
                                                        <a href="" ng-click="deleteFile(file, task.info.id)" target="_blank"  class="pull-right">
                                                            <span class="file_delete"></span>
                                                        </a>
                                                        @endif
                                                        <a href="" ng-click="downloadFile(file.id)" download="@{{file.original_filename}}" target="_blank" class="pull-right">
                                                            <span class="file_download"></span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                            <div ng-show="task.files.length === 0">
                                                <div class="row taskfile_entry">
                                                    <div class="col-xs-12 truncate">There are no files associated with the current task</div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-3 task_comments">
                                            <div class="row desc_details">Comments</div>
                                            <div class="row">
                                                <textarea ng-model="comment" rows="5" cols="45" ng-readonly="(task.info.status === 'complete')" ng-bind="comment" placeholder="Please add a comment"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container taskfile_progress" ng-style="{display: 'none'}">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="taskfile_progress_bar">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                                        <span class="sr-only">0% Complete</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group col-xs-4"></div>
                                            <div class="btn-group col-xs-1"></div>
                                            <div class="btn-group col-xs-3"></div>
                                        </div>
                                    </div>

                                    <div class="taskfile_buttons" ng-hide="task.info.status === 'complete'">
                                        <div class="row">

                                            <div class="col-xs-8">
                                                <div class="row">
                                                    <div class="col-xs-6 taskfile_upload">
                                                        <span class="span_btn truncate" ng-file-select ng-model="ufiles">Upload file <span></span></span>
                                                    </div>
                                                    <div class="col-xs-6 taskfile_notify">
                                                        @if (Auth::user()->hasRole("User") or Auth::user()->hasRole("admin"))
                                                        <span class="span_btn pull-right truncate" ng-click="openNotificationsModal(task, {subject: '', message: ''})">Notify Promoter <span></span></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-1"></div>
                                            <div class="col-xs-3 taskfile_comment">
                                                <span class="span_btn truncate" ng-click="saveComment()">Save comment <span></span></span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" ng-show="$state.current.name === 'form.dashboard' && $root.promoter_events[$root.event_ndx].tasks.length > 5 && !$root.invalid_event_id" style="margin-top: 50px">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5" style="position: relative">
                    <button class="dashboard-filter pull-right" ng-click="setMaxTasks()">Show @{{ $root.max_items === 5 ? "all" : "top 5"  }}</button>
                </div>
            </div>
        </div>

    </div>

</script>

@extends('app')

@section('header')
    <div class="home-header">
        <div class="row dashboard-header">

            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 dashboard-header-left">
                <div class="row">
                    <div class="col-xs-2 no-padding">{!! Html::image($user->getPhotoPath(), 'home', array('class' => 'img-responsive img-circle user-logo')) !!}</div>
                    <div class="col-xs-10 dashboard-user-details-header">
                        <div class="row">
                            <div class="col-xs-12">{!! $user->first_name.' '.$user->last_name !!}</div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="/profile">Profiel bewerken</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 dashboard-header-center">
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::open(array('url' => '/search')) !!}
                        <div class="input-group">
                            {!! Form::text('search-term', old('search-term'), array('class'=>'form-control', 'placeholder'=>'')) !!}
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default invitation-search"><span class="fa fa-search"></span></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">&nbsp;</div>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="content container dashboard">
        <div class="row">

            <!-- Groups -->
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 dashboard-groups">

                <!-- groups header -->
                <div class="row dashboard-groups-header">
                    <div class="col-xs-4 no-padding">
                        <span class="fa fa-users"></span> Groups
                    </div>
                    <div class="col-xs-5">
                        <a href={!! url('/groups/create') !!} class="create-group truncate">
                            <span class="fa fa-plus-circle"></span> Create Group
                        </a>
                    </div>
                    <div class="col-xs-3 no-padding">
                        <a href="" class="pull-right see-all">See all &#xbb;</a>
                    </div>
                </div>

                <!-- group entries -->
                <div class="row dashboard-groups-entries">
                    <div class="col-xs-12">

                        @foreach($user_groups as $ugroup)
                        <div class="row dashboard-groups-entry">
                            <a href={!! url('/groups/'.$ugroup->id.'/details') !!} style="display:block; position: absolute; top: 0; right: 0; bottom: 0; left: 0; z-index:1000;"></a>
                            <!-- left picture -->
                            <div class="col-xs-4 no-padding">
                                {!! Html::image($ugroup->getPhotoPath(), 'home', array('class' => 'img-responsive')) !!}
                            </div>
                            <!-- right details -->
                            <div class="col-xs-8">
                                <!-- group name -->
                                <div class="row dashboard-groups-entry-name">
                                    <div class="col-xs-12">{!! $ugroup->name !!}</div>
                                </div>
                                <!-- group cat -->
                                <div class="row dashboard-groups-entry-cat">
                                    <div class="col-xs-12">Technology</div>
                                </div>
                                <div class="row dashboard-groups-entry-details">
                                    <!-- group city -->
                                    <div class="col-xs-8 dashboard-groups-entry-location">{!! $ugroup->city !!}</div>
                                    <!-- group users -->
                                    <div class="col-xs-4 dashboard-groups-entry-users">
                                        <div class="pull-right">
                                            <span class="fa fa-user"></span> {!! $ugroup->users()->count() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12"><div class="next-meeting">Next event: Team meeting</div></div>
                                </div>
                                <div class="row dashboard-groups-entry-time countdown" data-targetdate={!! $ugroup->next_meeting_timestamp() !!}>
                                    <div class="col-xs-3 ">
                                        <div class="countdown-days pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="countdown-hours pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="countdown-minutes pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3 ">
                                        <div class="countdown-seconds pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row dashboard-groups-entry-time-labels">
                                    <div class="col-xs-3">
                                        <div class="pull-right">Days</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Hours</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Minutes</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @if($user_groups->count() === 0)
                            <p>You are not a member of any groups</p>
                        @endif

                    </div>
                </div>

            </div>

            <!-- Activities -->
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 dashboard-activities">

                <!-- activities header -->
                <div class="row dashboard-activities-header">

                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 no-padding-right">
                        <row>
                            <div class="col-xs-8 pull-left no-padding-left">
                                <span class="fa fa-clock-o"></span> Activities
                            </div>
                            <div class="col-xs-4 pull-right no-padding-right">
                                <a href="" class="pull-right see-all">See all &#xbb;</a>
                            </div>
                        </row>
                    </div>

                </div>

                <!-- activities entries -->
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1">

                        @if(count($past_activities) > 0)
                        <div class="dashboard-activities-entries border-left">

                            @foreach($past_activities as $u_past_activity)
                            <div class="dashboard-activities-entry-container">

                                <div class="row dashboard-activities-entry">
                                    <div class="left-triangle"></div>
                                    <!-- left pic -->
                                    <div class="col-xs-2 no-padding">
                                        {!! Html::image($user->getPhotoPath(), 'home', array('class' => 'img-responsive img-circle')) !!}
                                    </div>
                                    <!-- right details -->
                                    <div class="col-xs-10">
                                        <!-- entry title -->
                                        <div class="row dashboard-activities-entry-title">
                                            <div class="col-xs-12"><span class="activities-verb"> Attended</span> Team meeting</div>
                                        </div>
                                        <!-- entry date -->
                                        <div class="row dashboard-activities-entry-details">
                                            <div class="col-xs-12"> {!! $u_past_activity->date_vstr() !!}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        @else
                        <div class="dashboard-activities-entries">
                            <p>You have not participated in any past activities</p>
                        </div>
                        @endif

                    </div>
                </div>

            </div>

            <!-- Upcoming Events -->
            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 dashboard-upcoming">

                <!-- upcoming events header -->
                <div class="row dashboard-upcoming-header">
                    <div class="col-xs-8 no-padding">
                        <div class="pull-left"><span class="fa fa-calendar"></span> Upcoming Events</div>
                    </div>
                    <div class="col-xs-4 no-padding">
                        <a href="" class="pull-right see-all">See all &#xbb;</a>
                    </div>
                </div>

                <!-- there are always future meetings for a group -->
                @if($user->groups()->count() > 0)
                <!-- large entry -->
                <div class="row">
                    <div class="col-xs-12">

                        <div class="row dashboard-upcoming-large">
                            <div class="col-xs-12">
                                <!-- top row -->
                                <div class="row">
                                    <!-- left pic -->
                                    <div class="col-xs-2 no-padding">
                                        {!! Html::image($user->groups()->first()->getPhotoPath(), 'home', array('class' => 'img-responsive')) !!}
                                    </div>
                                    <!-- right details -->
                                    <div class="col-xs-10">
                                        <!-- entry title -->
                                        <div class="row">
                                            <div class="col-xs-12 dashboard-upcoming-large-title">  Team meeting</div>
                                        </div>
                                        <!-- entry date -->
                                        <div class="row">
                                            <div class="col-xs-12 dashboard-upcoming-large-details"> {!! $user->next_meeting_date() !!}</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- time values -->
                                <div class="row dashboard-upcoming-large-time countdown" data-targetdate={!! $user->next_meeting_timestamp()!!}>
                                    <div class="col-xs-3">
                                        <div class="countdown-days pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="countdown-hours pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="countdown-minutes pull-right">0</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="countdown-seconds pull-right">0</div>
                                    </div>
                                </div>
                                <!-- time labels -->
                                <div class="row dashboard-upcoming-large-time-labels">
                                    <div class="col-xs-3">
                                        <div class="pull-right">Days</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Hours</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Minutes</div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="pull-right">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- small entries -->
                <div class="row dashboard-upcoming-entries">
                    <div class="col-xs-12">

                        @for($ndx = 2; $ndx < 5; $ndx++)
                        <div class="row dashboard-upcoming-entry">
                            <!-- left pic -->
                            <div class="col-xs-2 no-padding">
                                {!! Html::image($user->groups()->first()->getPhotoPath(), 'home', array('class' => 'img-responsive')) !!}
                            </div>
                            <!-- right details -->
                            <div class="col-xs-10">
                                <!-- entry title -->
                                <div class="row">
                                    <div class="col-xs-12 dashboard-upcoming-entry-title">  Team meeting</div>
                                </div>
                                <!-- entry date -->
                                <div class="row">
                                    <div class="col-xs-12 dashboard-upcoming-entry-details"> {!! $user->next_meeting_date($ndx) !!}</div>
                                </div>
                            </div>
                        </div>
                        @endfor

                    </div>
                </div>
                @else
                <div class="row dashboard-upcoming-entries">
                    <div class="col-xs-12">
                        <p>You don't have any upcoming events</p>
                    </div>
                </div>
                @endif

            </div>
        </div>

    </div>

@endsection

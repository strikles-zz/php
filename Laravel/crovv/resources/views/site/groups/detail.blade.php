@extends('app')

@section('header')
    <div class="home-header">

        <!-- groups title -->
        <div class="row">
            <div class="col-xs-12"><span class="glyphicon glyphicon-circle-arrow-left"></span> Groups</div>
        </div>

        <!-- image + everything else -->
        <div class="row" style="display: table;">

            <!-- group image -->
            <div class="col-xs-2 table-col" style="background-image: url('{!! url($group->getPhotoPath()) !!}'); background-size: contain; background-position: 15px, center; background-repeat: no-repeat"></div>

            <div class="col-xs-8 table-col" style="border-top: 1px solid rgba(255,255,255,0.2)">

                <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                    <!-- group next meeting -->
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-12">Next meeting</div>
                        </div>
                        <div class="row top-gap-xs countdown" data-targetdate={!! $group->next_meeting_timestamp() !!}>
                            <div class="col-xs-3">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="countdown-days pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Days</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="countdown-hours pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Hours</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="countdown-minutes pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Minutes</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="countdown-seconds pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Seconds</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- group attendees -->
                    <div class="col-xs-6" style="border-left: 1px solid rgba(255,255,255,0.4);border-right: 1px solid rgba(255,255,255,0.4)">
                        <div class="row">
                            <div class="col-xs-12">Attendees</div>
                        </div>
                        <div class="row top-gap-xs">
                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="pull-right">{!! $group->next_meeting() ? $group->next_meeting()->atendees()->count() : 0 !!}</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Attending</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="pull-right">{!! $group->users() ? ($group->next_meeting() ? $group->users()->count() - $group->next_meeting()->atendees()->count() : $group->users()->count()) : 0 !!}</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Pending</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="row">
                                    <div class="col-xs-12 details_large">
                                        <div class="pull-right">0</div>
                                    </div>
                                </div>
                                <div class="row top-gap-xs align-bottom lighter-sm">
                                    <div class="col-xs-12 awhite">
                                        <div class="pull-right">Guests</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- group options -->
            <div class="col-xs-2 table-col">
                <div class="row">
                    <div class="col-xs-12">Options</div>
                </div>
                <div class="row top-gap-xs">
                    <div class="col-xs-12">
                        <button class="group_attend truncate" data-toggle="modal" data-target="#attendModal">Attend meeting</button>
                        <button class="group_info top-gap-xs truncate">More Info</button>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('content')
    <div class="content container groups-detail">
        <div class="row top-gap">

            <!-- group -->
            <div class="col-xs-2">
                <div class="group_name_head">{!! $group->name !!}</div>
                <p class="group_info lighter-sm top-gap">{!! $group->description !!}</p>

                <h4>Website</h4>
                <a href={!! $group->website !!} class="group_website">{!! $group->website !!}</a>
            </div>

            <!-- members -->
            <div class="col-xs-8 group_detail_members">

                <div class="row">
                    <div class="col-xs-12 group_members_head">Members <span class="lighter">{!! "(".$group_users->count().") " !!}</span><span class="glyphicon glyphicon-plus-sign" style="color: rgba(57, 149, 139, 1)"></span></div>
                </div>

                <div class="group_members_list top-gap">
                    @foreach($group_users as $guser)
                    <div class="group_member_entry" style="width: 10rem; height: 10rem;">
                    {!! Html::image($guser->getPhotoPath(), $guser->name, array('class' => 'img-responsive img-circle')) !!}
                    </div>
                    @endforeach
                </div>

            </div>

            <!-- options -->
            <div class="col-xs-2">
                <div class="group_options_head">Options</div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn group-leave" data-toggle="modal" data-target="#leaveModal">Leave Group</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href={!! url("/groups/$group->id/invite") !!} class="btn group-join">Invite Others</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn group-notification"  data-toggle="modal" data-target="#notificationModal">Notification</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- leave group modal -->
    <div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="leaveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(array('url' => '/groups/'.$group->id.'/leave', 'class'=>'form', 'id'=>'attend_meeting_modal')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="modal-title" id="leaveModalLabel">Leave Group</p>
                </div>
                <div class="modal-body">
                    Are you sure you would like to leave this group ?
                </div>
                <div class="modal-footer">
                    {!! Form::button('Cancel', array('class' => 'btn', 'data-dismiss' => 'modal')) !!}
                    {!! Form::submit('Leave Group', array('class' => 'btn')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- attend meeting modal -->
    <div class="modal fade" id="attendModal" tabindex="-1" role="dialog" aria-labelledby="attendModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(array('url' => '/groups/'.$group->id.'/attend', 'class'=>'form', 'id'=>'attend_meeting_modal')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="modal-title" id="attendModalLabel">Attend Meeting</p>
                </div>
                <div class="modal-body">
                    Press the button below to attend the next meeting held by this group
                </div>
                <div class="modal-footer">
                    {!! Form::button('Cancel', array('class' => 'btn', 'data-dismiss' => 'modal')) !!}
                    {!! Form::submit('Attend Meeting', array('class' => 'btn')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- notify users modal -->
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(array('url' => '/groups/'.$group->id.'/notify', 'class'=>'form', 'id'=>'chairman_notification_modal')) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p class="modal-title" id="notificationModalLabel">Notify group users</p>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::text('message-subject', null, array('class' => 'form-control', 'placeholder' => 'Subject')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('message-content', null, array('class' => 'form-control', 'placeholder' => 'Message')) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Cancel', array('class' => 'btn', 'data-dismiss' => 'modal')) !!}
                    {!! Form::submit('Notify Group Members', array('class' => 'btn')) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

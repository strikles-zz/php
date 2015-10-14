@extends('emails.layout')

@section('content')
    <h4 class="text-center">Dear {!! $chairman['name'] !!},</h4>
    <h4 class="text-center">A user has applied to join the group {!! $group['name'] !!} of which you are the current chairman</h4>

    <label for="Description">User: </label>
    <p name="description">{!! $user['name'] !!}</p>

    <p>Please select your option below:</p>

    <a href={!! URL::to("/groups/invite/".$gi['group_invite_code']."/chairman/accepts") !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">ACCEPT</a>
    <a href={!! URL::to("/groups/invite/".$gi['group_invite_code']."/chairman/denies") !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">DENY</a>
@endsection

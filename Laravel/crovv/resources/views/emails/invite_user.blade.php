@extends('emails.layout')

@section('content')
    <h4 class="text-center">Dear {!! $user['name'] !!},</h4>
    <h4 class="text-center">You have been approved membership to the group {!! $group['name'] !!}</h4>

    <p>Please select your option below:</p>

    <a href={!! URL::to("/groups/invite/$invite_code/user/accepts") !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">ACCEPT</a>
    <a href={!! URL::to("/groups/invite/$invite_code/user/denies") !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">DENY</a>
@endsection

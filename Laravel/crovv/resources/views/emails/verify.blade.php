@extends('emails.layout')

@section('content')
    <p style="font-weight:bold; color:#000;">Dear {!! $user['first_name'].' '.$user['last_name'].',' !!}</p>
    <p style="color:#000;">Please click on the Confirm button below to verify your email and confirm your crovv account.</p>

    <a href={!! URL::to('register/verify/'.$user['confirmation_code']) !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">CONFIRM</a>
@endsection

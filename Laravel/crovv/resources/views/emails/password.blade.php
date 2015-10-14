@extends('emails.layout')

@section('content')

	<h4 class="text-center">Dear {!! $user->name !!},</h4>
	<p>You have requested to reset your password. Please click the button below to proceed.</p>
    <a href={!! url('password/reset/'.$token) !!} style="font-family:'Source Sans Pro', sans-serif; font-size: 16px; text-decoration: none; background:#000; color:#FFF;padding:10px 20px; display:inline-block">RESET PASSWORD</a>
@endsection



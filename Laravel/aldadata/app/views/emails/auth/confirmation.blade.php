<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>

<body style="font-family:'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif">
	<div style="display:block; text-align:-webkit-center;">
		<div style="width:494px; padding:0 53px; background-image: linear-gradient(bottom, #000 50%, #fff 50%); background-image: -o-linear-gradient(bottom, #000 50%, #fff 50%); background-image: -moz-linear-gradient(bottom, #000 50%, #fff 50%);
	background-image: -webkit-linear-gradient(bottom, #000 50%, #fff 50%); background-image: -ms-linear-gradient(bottom, #000 50%, #fff 50%); text-align:left;">
	    	<img style="display:block" src="{{URL::to('assets/img/nav-logo.png')}}" height="88"  alt=""/>
	  	</div>
		
		<div style="width:494px; padding:20px 53px; background-color:#EDECEC; text-align:left;">
			<h1>{{ Lang::get('confide::confide.email.account_confirmation.subject') }}</h1>

			<p>{{ Lang::get('confide::confide.email.account_confirmation.greetings', array( 'name' => $user->username)) }},</p>

			<p>{{ Lang::get('confide::confide.email.account_confirmation.body') }}</p>
			<a href='{{{ URL::to("user/confirm/{$user->confirmation_code}") }}}'>
			    {{{ URL::to("user/confirm/{$user->confirmation_code}") }}}
			</a>

			<p>{{ Lang::get('confide::confide.email.account_confirmation.farewell') }}</p>
		</div>

		<div style="width:600px; height:30px; background-color:#000;"></div>
	</div>
</body>
</html>
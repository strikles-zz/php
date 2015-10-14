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
			<p>Dear {{ $promoter->username }},<br></p>

			<p>We would like to remind you to enter the ticket sales for:</p>
			<p>{{ $curr_event->name }}</p>

			<a href="{{ URL::to('/missingticketsales/'.$autologin->token) }}">Please use this link</a>
			<p>or login at <a href="{{ URL::to('/') }}">{{ URL::to('/') }}</a> and enter your sales for the event there.</p>

			<p>Kind Regards,</p>
			<p>Alda Events</p>
		</div>
		<div style="width:600px; height:30px; background-color:#000;"></div>
	</div>
</body>
</html>

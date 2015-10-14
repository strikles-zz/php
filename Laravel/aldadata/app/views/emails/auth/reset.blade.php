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

			<p>Dear {{ $user->first_name }} {{ $user->last_name }},<br /></p>
			<p>An account has been created for you on the Alda Project plaform. </p>

			<a href='{{{ (Confide::checkAction('UserController@reset_password', array($token))) ? : URL::to('user/reset/'.$token)  }}}'>Click here to set your password</a>

			<p>&nbsp;</p>
			<p>Kind regards,</p>
			<p>&nbsp;</p>
			<p>Alda Events</p>
		</div>

		<div style="width:600px; height:30px; background-color:#000;"></div>
	</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    </head>
    <body style="font-family:'Open Sans', sans-serif; font-size:14px; color:#000; width:601px; height:435px;">

        <div style="display:block;">
            <img style="display:block; height:92px;" src="{!! URL::to('/images/emails/verify_account_header.png') !!}" alt="Crovv"/>

            <div style="padding:30px 20px; height:100%; text-align:left;">

                @yield('content')

                <p style="color:#000;">Our best regards,</p>
                <p style="font-weight:bold; color:#000;">The Crovv Staff</p>

            </div>

            <p style="background:#282828; color:#999; font-size:12px; font-weight:bold; height:60px; text-align:center; line-height:60px;">Copyright &copy; 2015 Crovv | All Rights Reserved</p>
        </div>

    </body>
</html>

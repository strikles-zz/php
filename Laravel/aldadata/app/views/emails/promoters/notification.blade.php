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
            <p>Dear {{ $promoter->first_name }} {{ $promoter->last_name }},<br /></p>

            <p>You have received a new notification from {{ $user->first_name ? : 'unknown' }} {{ $user->last_name ? : 'unknown' }} about an upcoming event:</p>
            <br />
            <table border="0" cellpadding="0" cellspacing="0">
            <tr><td width="90">Event:&nbsp;</td><td>{{ $event->name }}</td></tr>
            <tr><td width="90">City:&nbsp;</td><td>{{ $event->city ? : 'unknown' }}</td></tr>
            <tr><td width="90">Date:&nbsp;</td><td>{{ $event->date()->first() ? $event->date()->first()->datetime_start->format('d-m-Y') : 'unknown' }}</td></tr>
            </table>

            <br />

            <table border="0" cellpadding="0" cellspacing="0">
            <tr><td width="90">Task:&nbsp;</td><td><a href="{{ URL::to('/notifications/'.$token) }}">{{ $task->title }}</a></td></tr>
            <tr><td width="90">Deadline:&nbsp;</td><td>{{ $task->due_date }}</td></tr>
            <tr><td width="90">Subject:&nbsp;</td><td>{{ $email_subject }}</td></tr>
            </table>
            <br />
            <br />
            <p>Message:</p>

            <p>{{ $email_message }}</p>

            <br /><br /><br />

            <p>Kind Regards,</p>
            <br /><br />
            <p>{{ $user->first_name ? : '' }} {{ $user->last_name ? : '' }}</p>
            <p>Alda Events</p>
        </div>
        <div style="width:600px; height:30px; background-color:#000;"></div>
    </div>
</body>
</html>

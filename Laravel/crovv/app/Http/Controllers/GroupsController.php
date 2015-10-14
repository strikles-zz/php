<?php namespace App\Http\Controllers;

class GroupsController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function index()
    {
        $title = "Groups";
        $bodyclass = "app-groups";

        return view('site.groups.index', compact('title', 'bodyclass'));
    }

    public function getCreate()
    {
        $title = "Groups";
        $bodyclass = "app-groups";

        return view('site.groups.create', compact('title', 'bodyclass'));
    }

    public function getEdit($group)
    {
        $title = "Groups";
        $bodyclass = "app-groups";

        $group_users = $group->users()->get();

        return view('site.groups.edit', compact('title', 'group', 'group_users', 'bodyclass'));
    }

    public function getInvite($group)
    {
        $title = "Groups";
        $bodyclass = "app-groups";
        $users = \App\User::all();

        return view('site.groups.invite', compact('title', 'group', 'users', 'bodyclass'));
    }

    public function getDetails($group)
    {
        $title = "Groups";
        $bodyclass = "app-groups";
        $group_users = $group->users()->get();

        return view('site.groups.detail', compact('title', 'group', 'group_users','bodyclass'));
    }

    public function saveModel($group)
    {
        $group->name            = $all_input['name'];
        $group->description     = $all_input['description'];
        $group->country         = $all_input['country'];
        $group->city            = $all_input['city'];
        $group->language        = $all_input['language'];
        $group->meeting_weekday = $all_input['meeting_weekday'];
        $group->meeting_time    = $all_input['meeting_time'];

        $group->update();
    }

    public function postCreate()
    {
        // get all input
        $all_input = \Request::all();
        error_log("CI ".json_encode($all_input));

        // create group
        $group = \App\Group::create($all_input);

        // photo file input
        $photo_posted = array_key_exists('photo', $all_input);
        $photo_path   = 'images/icons/default_group.png';
        if($photo_posted)
        {
            $photo_path = 'images/uploads/groups/'.\Input::file('photo')->getClientOriginalName();
            \Image::make(\Input::file('photo'))->fit(100)->save($photo_path);
        }
        $group->photo = $photo_path;

        // attach user to group so that we can set him as a chairman
        $user = \Auth::user();
        $user->groups()->attach($group->id);

        // set user as user chairman
        $group->chairman_id     = $user->id;
        $group->meeting_weekday = (int) $all_input['meeting_weekday'];
        $group->update();
        error_log("CI ".json_encode($group));

        return redirect("/groups/$group->id/update");
    }

    public function postEdit($group)
    {
        // get all input
        $all_input = \Request::all();
        error_log("UI ".json_encode($all_input));

        // update with posted values
        $group->update($all_input);

        // photo file input
        $photo_posted = array_key_exists('photo', $all_input);
        if($photo_posted)
        {
            $photo_path = 'images/uploads/groups/'.\Input::file('photo')->getClientOriginalName();
            \Image::make(\Input::file('photo'))->fit(100)->save($photo_path);
            $group->photo = $photo_path;
        }

        // set user to chairman
        $group->meeting_weekday = (int) $all_input['meeting_weekday'];
        $group->update();
        error_log("CI ".json_encode($group));

        return redirect("/groups/$group->id/update");
    }


    /////////////
    // INVITES //
    /////////////

    public function postInvite($group)
    {
        // hoist top fnc to deal with users invited to a group

        $invited_users = \Request::input('users');
        foreach ($invited_users as $key => $iuser)
        {
            $cuser = \App\User::find($iuser);
            if (!$cuser)
            {
                error_log('Error could not find user:'.$iuser);
                continue;
            }

            $this->sendInviteToUser($cuser, $group);
        }
    }

    public function processInviteCode($invite_code)
    {
        // bottom fnc to deal with group invite codes

        error_log("Invite code - ".$invite_code);
        if(!$invite_code)
        {
            error_log("No invite code");
            throw new \Exception("No invite found");
        }

        // get groupinvite
        $gi = \App\Groupinvite::where('group_invite_code', $invite_code)->first();
        if (!$gi)
        {
            error_log("No groupinvite found");
            throw new \Exception("No groupinvite found");
        }

        // get the invited user
        $user = \App\User::find($gi->invitee_id);
        if (!$user)
        {
            error_log("No user for groupinvite found");
            throw new \Exception("No user for groupinvite found");
        }

        // get the respective group
        $group = \App\Group::find($gi->group_id);
        if (!$group)
        {
            error_log("No group for groupinvite found");
            throw new \Exception("No group for groupinvite found");
        }

        return array($user, $group, $gi);
    }

    public function processInviteCode2($invite_code)
    {
        // bottom fnc to deal with group invite codes

        error_log("Invite code - ".$invite_code);
        if(!$invite_code)
        {
            error_log("No invite code");
            throw new \Exception("No invite found");
        }

        // get groupinvite
        $gi = \App\Groupinvite::where('group_invite_code', $invite_code)->first();
        if (!$gi)
        {
            error_log("No groupinvite found");
            throw new \Exception("No groupinvite found");
        }

        // get the invited user
        $user = \App\User::find($gi->invitee_id);
        if (!$user)
        {
            error_log("No user for groupinvite found");
            throw new \Exception("No user for groupinvite found");
        }

        // get the respective group
        $group = \App\Group::find($gi->group_id);
        if (!$group)
        {
            error_log("No group for groupinvite found");
            throw new \Exception("No group for groupinvite found");
        }

        return array($user, $group, $gi);
    }

    public function sendInviteToUser($user, $group)
    {
        // invite code
        $invite_code = str_random(30);

        // send a mail to user
        \Mail::queue('emails.invite_user', array('user' => $user, 'group' => $group, 'invite_code' => $invite_code), function($message) use ($user, $group, $invite_code) {
            $message->to($user->email, $user->name)
                ->subject('Crovv - You have been invited to join a group');
        });

        // create an invite entry
        \App\Groupinvite::create(['group_id' => $group->id, 'group_invite_code' => $invite_code, 'inviter_id' => \Auth::user()->id, 'invitee_id' => $user->id]);
    }

    public function userAcceptsInvite($invite_code)
    {
        error_log("Invite code - ".$invite_code);

        list($user, $group, $gi) = $this->processInviteCode($invite_code);
        $chairman = \App\User::find($group->chairman_id);

        if(!$chairman)
        {
            error_log("No group chairman found");
            throw new \Exception("No group chairman found");
        }

        // send email notification to chairman
        \Mail::queue('emails.invite_chairman_notification', array('user' => $user, 'chairman' => $chairman, 'group' => $group, 'gi' => $gi), function($message) use ($user, $chairman, $group, $gi) {
            $message->to($chairman->email, $user->name)
                ->subject('Crovv - A user has applied for membership of a group led by you');
        });

        return redirect("/dashboard");
    }

    public function userDeniesInvite($invite_code)
    {
        list($user, $group, $gi) = $this->processInviteCode($invite_code);
        $group->group_invite_code;

        // if we don't clean the invite_code then do nothing
        return redirect("/dashboard");
    }

    public function chairmanAcceptsInvite($invite_code) {

        list($user, $group, $gi) = $this->processInviteCode($invite_code);

        // attach user to group
        // if not already attached
        $user_groups = $user->groups()->get();
        if(!$user_groups->contains($gi->group_id))
        {
            $user->groups()->attach($gi->group_id);

            // mail user with confirmation
            \Mail::queue('emails.invite_approved', array('user' => $user, 'group' => $group, 'gi' => $gi), function($message) use ($user, $group, $gi) {
                $message->to($user->email, $user->name)
                    ->subject('Crovv - you have been accepted membership to the group');
            });
        }

        return redirect("/dashboard");
    }


    public function chairmanDeniesInvite($invite_code) {

        list($user, $group, $gi) = $this->processInviteCode($invite_code);

        // mail user with I'm so sorry msg
        \Mail::queue('emails.invite_denied', array('user' => $user, 'group' => $group, 'gi' => $gi), function($message) use ($user, $group, $gi) {
            $message->to($user->email, $user->name)
                ->subject('Crovv - you have been denied membership to the group');
        });

        return redirect("/dashboard");
    }

    public function leaveGroup($group)
    {
        $user = \Auth::user();
        if($user->id !== $group->chairman_id)
        {
            $user->groups()->detach($group->id);
            return redirect("/dashboard");
        }
        else
        {
            $errors = "You must elect a new chairman before you leave the group";
            return view('errors.generic', compact());
        }
    }

    public function attendMeeting($group)
    {
        // next meeting date
        $next_meeting_date = date(date('Y-m-d', strtotime('next '.$group->weekdays[(int)$group->meeting_weekday]))." ".$group->meeting_time);

        // check if a meeting entry exists for the next meeting date, if not create a new one
        $next_meeting = \App\Groupmeeting::firstOrCreate(['group_id' => $group->id, 'meeting_date' => $next_meeting_date]);
        if(!$next_meeting)
        {
            error_log("Could not find or create a meeting for the $group->name group");
            throw new \Exception("Could not find or create a meeting for the $group->name group");
        }

        // add entry if one doesn't exist yet
        $user = \Auth::user();
        $user_attendance = \App\Groupmeetingattendees::firstOrCreate(['meeting_id' => $next_meeting->id, 'user_id' => $user->id]);
        if(!$user_attendance)
        {
            error_log("Could not find or create a meeting attendance entry for the $group->name group");
            throw new \Exception("Could not find or create a meeting attendance entry for the $group->name group");
        }

        return redirect("/dashboard");
    }

    public function notifyUsers($group)
    {
        // check if the user is the group chairman
        $user = \Auth::user();
        if($user->id !== $group->chairman_id)
        {
            error_log("You are not a group chairman for the $group->name group. therefore you can't notify group users");
            throw new \Exception("You are not a group chairman for the $group->name group. therefore you can't notify group users");
        }

        $all_input   = \Request::all();
        $group_users = $group->users()->get();
        foreach ($group_users as $key => $guser)
        {
            // No point in chairman notifying himself
            if($guser->id === $group->chairman_id)
            {
                error_log('skipping chairman');
                continue;
            }

            error_log(json_encode($guser));

            // invite code
            $invite_code = str_random(30);

            // send a mail to user
            \Mail::queue('emails.group_notification', array('guser' => $guser, 'group' => $group, 'all_input' => $all_input), function($message) use ($guser, $group, $all_input) {
                $message->to($guser->email, $guser->name)
                    ->subject('Crovv - Group notification');
            });
        }

        return redirect("/dashboard");
    }
}

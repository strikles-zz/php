<?php

class TaskEventController extends CRUDController {

    public function __construct() {

        $this->name       = 'taskevents';
        $this->modelName  = 'TaskEvent';
        $this->singleName = 'taskevent';

        $this->validationRules = [
        ];
        $this->validationMessages = [
        ];
    }

    public function postComment($event, $task)
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $all_input = Input::all();
        $task->comment              = $all_input['comment_content'];

        $task->cnt_updated_comments = 1;
        $task->updated_by           = $user->id;

        // reset files if users differ
        if($task->updated_by !== $user->id) {
            $task->cnt_updated_files    = 0;
            $task->owner_changed_at = date("Y-m-d H:i:s");
        }

        $task->save();
        $response = Response::make('Comment saved', 200);

        return $response;
    }

    public function sendNotification($promoters, $event, $task, $mode) {

        $all_input = Input::all();
        foreach ($promoters as $ndx => $promoter)
        {
            $email_address = $promoter->email;
            $email_content = $all_input['email_content'];
            $email_subject = $all_input['email_subject'];

            $user = Auth::user();

            // create an autologn entry
            $autologin_token = str_random(30);
            $autologin_entry = TaskNotificationAutologin::create(['users_id' => $promoter->id, 'events_id' => $event->id, 'taskevents_id' => $task->id, 'token' => $autologin_token]);

            Mail::send('emails.promoters.notification', array('email_subject' => $email_subject, 'email_message' => $email_content, 'promoter' => $promoter, 'user' => $user, 'event' => $event, 'task' => $task, 'token' => $autologin_token), function($message) use ($promoter, $email_subject)
            {
                $message->to($promoter->email, $promoter->username)->subject($email_subject);
            });

            eerror_log($mode.' Sent mail to '.$promoter->email);
            Debugbar::info($mode.' Sent mail to '.$promoter->email.' task group_id: '.$task->group_id.' type '.$promoter->types()->get());
        }

    }

    public function postNotification($event, $task)
    {

        eerror_log('Notification Task '.json_encode($task));

        // get promoters associated through event
        // $event_promoters = $event->promoters()->whereHas('types', function($q) use ($task)
        // {
        //     $q->where('taskgroups.id', $task->group_id)
        //         ->orWhere('taskgroups.id', 5);
        // })->get();
        // Debugbar::info($event_promoters);
        // $this->sendNotification($event_promoters, $event, $task, 'event');


        $matching_promoters = [];
        $event_promoters = $event->promoters()->get();
        foreach ($event_promoters as $key => $promoter) {

            Debugbar::info($promoter->email);
            $promoter_types = $promoter->types()->get();
            foreach ($promoter_types as $key => $eptype) {

                Debugbar::info($eptype->id, $task->group_id, ((int)$eptype->id === (int)$task->group_id || (int)$eptype->id === 5));
                if((int)$eptype->id === (int)$task->group_id || (int)$eptype->id === 5) {
                    $matching_promoters[] = $promoter;
                }
            }
        }
        $this->sendNotification($matching_promoters, $event, $task, 'event');

        // get promoters associated through company
        $all_event_companies = Company::selectRaw('companies.*, events_companies_xref.event_id, events_companies_xref.company_id')
                                    ->join('events_companies_xref', 'companies.id','=', 'events_companies_xref.company_id')
                                    ->where('events_companies_xref.event_id', (int)$event->id)
                                    ->where('companies.type', 'Promotor')
                                    ->get();


        foreach ($all_event_companies as $company_key => $company)
        {
            $matching_cpromoters = [];
            $company_promoters = $company->promoters()->get();
            foreach ($company_promoters as $key => $cpromoter) {

                $cpromoter_types = $cpromoter->types()->get();
                foreach ($cpromoter_types as $key => $cptype) {

                    Debugbar::info($cptype->id, $task->group_id, ((int)$cptype->id === (int)$task->group_id || (int)$cptype->id === 5));
                    if((int)$cptype->id === (int)$task->group_id || (int)$cptype->id === 5) {
                        $matching_cpromoters[] = $cpromoter;
                    }
                }
            }
            $this->sendNotification($matching_cpromoters, $event, $task, 'company');
        }

        return Response::make('Email sent', 200);
    }

    public function postStatus($event, $task)
    {
        $all_input = Input::all();
        $task->status = ($all_input['task_status'] === true ? 'complete' : 'incomplete');

        $task->save();
        $response = Response::make('status saved', 200);

        return $response;
    }

    public function postActive($event, $task)
    {
        $all_input = Input::all();

        $task->active = ($all_input['active_status'] === true ? 1 : 0);

        $task->save();
        $response = Response::make('status saved', 200);

        return $response;
    }

    public function postDueDate($event, $task)
    {
        $all_input      = Input::all();
        $tmp_due_date   = explode("-", $all_input['selected_date']);
        $new_due_date   = $tmp_due_date[2].'-'.$tmp_due_date[1].'-'.$tmp_due_date[0];
        $task->due_date = $new_due_date;

        eerror_log("Le posted due date ".json_encode($task->due_date));

        $task->save();
        $response = Response::make('status saved', 200);

        return $response;
    }

    public function getTaskEvent($te)
    {

        $task_files = TaskFile::selectRaw('taskfiles.*, users.username')
                        ->join('users', 'taskfiles.users_id', '=', 'users.id')
                        ->where('taskevents_id', $te->id)
                        ->get();

        $resp[] = ['info' => $te, 'files' => $task_files];

        return Response::json((object)$resp);
    }
}

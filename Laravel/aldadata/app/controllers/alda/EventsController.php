<?php

class EventsController extends CRUDController {

    public function __construct() {

        $this->name = 'events';
        $this->modelName = 'Events';
        $this->singleName = 'event';

        $this->validationRules = [
            //'event_date'                       => 'after:now',
            'ticketsystem_recording_startdate' => 'required_with:ticketsystem_enabled|date|after:2010W01',
            'ticketsystem_autoremind_user_id'  => 'required_with:ticketsystem_autoremind'
        ];
        $this->validationMessages = [
        ];

        $this->dataTableColumns = ['id', 'name'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate() {

        $title = 'Add New ' . ucfirst($this->singleName);
        $controller = $this->name;

        $input_validation = $this->validateModel();
        if ($input_validation !== true)
        {
            $this->populateForm();
            Former::withErrors($input_validation);
            return View::make('site/' . $this->name . '/create', compact('title', 'controller'))->with('error', 'Not saved!');
        };

        $model = $this->saveModel();
        $model->created_by = Auth::user()->id;
        $model->save();

        $this->populateForm($model);
        $this->addDefaultTasks($model);

        return Redirect::to($this->name . '/' . $model->id . '/edit')->with('success', 'Saved!');
    }

    public function addDefaultTasks($model) {

        // add to taskevents all the tasktemplates
        $default_tasks = TaskTemplate::all();
        $event_date_col = $model->date()->first();

        if(!$event_date_col) {
            return;
        }

        $event_date = $event_date_col->datetime_start->format('Y-m-d');
        eerror_log("Le event date : ".$event_date);
        foreach ($default_tasks as $task_ndx => $task)
        {
            if($task->deadline_days_gap > 0)
            {
                $task_deadline = date('Y-m-d', strtotime(- $task->deadline_days_gap . ' days', strtotime($event_date)) );
            }
            else
            {
                $task_deadline = date('Y-m-d', strtotime($event_date));
            }

            $new_task = new TaskEvent();
            $new_task->title             = $task->title;
            $new_task->description       = $task->description;
            $new_task->due_date          = $task_deadline;
            $new_task->status            = 'incomplete';
            $new_task->group_id          = $task->group_id;
            $new_task->events_id         = $model->id;
            $new_task->deadline_days_gap = $task->deadline_days_gap;
            $new_task->updated_by        = Auth::user()->id;
            $new_task->owner_changed_at  = date("Y-m-d H:i:s");

            eerror_log('task due date '.json_encode($new_task->due_date).'\n');

            $new_task->save();
        }
    }

    protected function saveModel($event = false) {

        if (Input::get('id'))
        {
            $event = Events::find(Input::get('id'));
        }

        if (!$event)
            $event = new Events();

        $event->name = Input::get('name');
        $event->proposed_opening_time   = Input::get('proposed_opening_time');
        $event->proposed_closing_time   = Input::get('proposed_closing_time');
        $event->proposed_local_sponsors = Input::get('proposed_local_sponsors');
        $event->promotional_activities  = Input::get('promotional_activities');
        $event->eval_financial_score    = Input::get('eval_financial_score');
        $event->eval_financial_text     = Input::get('eval_financial_text');
        $event->eval_marketing_score    = Input::get('eval_marketing_score');
        $event->eval_marketing_text     = Input::get('eval_marketing_text');
        $event->eval_travel_score       = Input::get('eval_travel_score');
        $event->eval_travel_text        = Input::get('eval_travel_text');
        $event->eval_production_score   = Input::get('eval_production_score');
        $event->eval_production_text    = Input::get('eval_production_text');
        $event->eval_extra_text         = Input::get('eval_extra_text');

        // new stuff 1
        $event->curfew                              = Input::get('curfew');
        $event->minimal_age_limit                   = Input::get('minimal_age_limit');
        $event->alcohol_license                     = Input::get('alcohol_license');
        $event->restrictions_on_merchandise_sales   = Input::get('restrictions_on_merchandise_sales');
        $event->sound_restrictions                  = Input::get('sound_restrictions');
        $event->booked_for_setup_from               = Input::get('booked_for_setup_from');
        $event->booked_for_break_until              = Input::get('booked_for_break_until');

        // new stuff 2
        $event->hotel1_name = Input::get('hotel1_name');
        $event->hotel2_name = Input::get('hotel2_name');
        $event->hotel1_website = Input::get('hotel1_website');
        $event->hotel2_website = Input::get('hotel2_website');
        $event->hotel1_travel_time_from_airport = Input::get('hotel1_travel_time_from_airport');
        $event->hotel2_travel_time_from_airport = Input::get('hotel2_travel_time_from_airport');
        $event->hotel1_travel_time_from_venue = Input::get('hotel1_travel_time_from_venue');
        $event->hotel2_travel_time_from_venue = Input::get('hotel2_travel_time_from_venue');

        $event->ticketsystem_enabled = Input::get('ticketsystem_enabled');
        $event->currency_id = Input::get('currency_id');
        $event->ticketsystem_recording_startdate = Input::get('ticketsystem_recording_startdate');
        $event->ticketsystem_locked_for_promoter = Input::get('ticketsystem_locked_for_promoter');

        $event->ticketsystem_autoremind_user_id = Input::get('ticketsystem_autoremind_user_id');
        $event->ticketsystem_autoremind = Input::get('ticketsystem_autoremind');

        $event->save();

        if (Input::get('event_date'))
        {
            //error_log('Event date '.json_encode(Input::get('event_date')));
            $input_date = strtotime(Input::get('event_date'));
            $date = $event->date()->first();
            if ($date)
            {
                // update current date
                $date->datetime_start = date("Y-m-d H:i:s", $input_date);
                $date->datetime_end = date("Y-m-d H:i:s", $input_date);
                $date->update();
            }
            else
            {
                // create new date
                $event_date = new Dates([
                    'datetime_start' => date("Y-m-d H:i:s", $input_date),
                    'datetime_end' => date("Y-m-d H:i:s", $input_date)
                ]);

                $event_date->save();
                $event->date()->attach($event_date);
            }

            $response = Event::fire('event.datechanged', array($event));
        }

        if (Input::get('contact_id')) {
            $event->contacts()->detach(Contact::find(Input::get('contact_id')));
            $event->contacts()->attach(Contact::find(Input::get('contact_id')));
        }

        if (Input::get('venue_id')) {
            $event->venues()->detach(Venue::find(Input::get('venue_id')));
            $event->venues()->attach(Venue::find(Input::get('venue_id')));
        }

        if (Input::get('company_id')) {
            $event->companies()->detach(Company::find(Input::get('company_id')));
            $event->companies()->attach(Company::find(Input::get('company_id')));
        }

        if (Input::get('promoter_id')) {
            $event->users()->detach(User::find(Input::get('promoter_id')));
            $event->users()->attach(User::find(Input::get('promoter_id')));
        }

        return $event;

    }

    public function populateForm($model = false) {

        if ($model) {
            $venues = $model->venues;
            $tickets = $model->tickets;
            $promoters = $model->users;
            $date = $model->date()->first();
            $currency = $model->currency;

            Former::populate( $model );
            if ($date) {
                Former::populateField('event_date', date('Y-m-d', strtotime($date->datetime_start)));
            }
        } else {
            $input = Input::All();
            Former::populate( $input);
        }
    }

    /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData() {

        $Model = $this->modelName;
        $models = $Model::select($this->dataTableColumns);
        $actions = [
            '<a href="{{{ URL::to(\'iframe\') }}}"
                data-action="edit"
                data-type="' . $this->name . '"
                data-id="{{ $id }}"
                data-url="{{{ URL::to(\'' . $this->name . '/\' . $id . \'/edit\' ) }}}"
                class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>',
            '<a href="{{{ URL::to(\'' . $this->name . '/\' . $id . \'/delete\' ) }}}" class="modal-popup btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>'
        ];
        return Datatables::of($models)
            ->add_column('date', function($row) use ($Model) {
                $event_date = $Model::find($row->id)->date()->first();
                if ($event_date) {
                    return date('j-n-Y', strtotime($event_date->datetime_start));
                }
            })
            ->add_column('actions', implode('&nbsp;', $actions))
            ->remove_column('id')
            ->make();
    }

     // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

        $datums = Events::selectRaw('name AS value')
            ->addSelect('id');

        if (Input::get('q')) {
            $queryTokens = explode(' ', Input::get('q'));

            foreach ($queryTokens as $queryToken) {
                $datums = $datums->where(function($query) use ($queryToken) {
                    $query->where('name', 'like', '%' . $queryToken . '%');
                });
            }
        }

        $datums = $datums->distinct()->take(50)->get();
        $datums_out = [];
        foreach ($datums as $datum)
        {
            $datum_out = [];
            $datum_out['id'] = $datum->id;
            $datum_out['value'] = $datum->value;
            $datum_out['tokens'] = array_merge(explode(' ', $datum->value), [$datum->value]);
            $event_date = $datum->date->first();

            if ($event_date) {
                $datum_out['event_date'] = date('j-n-Y', strtotime($event_date->datetime_start));
            }

            $datums_out[] = $datum_out;
        }

        return Response::json($datums_out);
    }
}

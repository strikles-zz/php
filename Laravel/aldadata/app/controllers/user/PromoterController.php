<?php

class PromoterController extends BaseController {


    public function getIndex()
    {
        $user = Auth::user();
        if($user->hasRole('promoter') && $user->company()->first())
        {
            $company_data_complete = $this->isPromoterDataComplete($user);
            // if not redirect to completion
            if(!$company_data_complete)
            {
                return Redirect::to('/my-events/registration');
            }
        }

        // aws s3
        $aws       = new S3Controller();
        eerror_log(json_encode($aws));

        $awsinit   = '{ "key": curr_file, "AWSAccessKeyId": "AKIAJ5YGKDS3CH3BT2MA", "acl": "public-read", "policy": "'.$aws->policy.'", "signature": "'.$aws->signature.'", "success_action_status": "201"}';
        $policy    = $aws->policy;
        $signature = $aws->signature;
        eerror_log(json_encode($awsinit));


        return View::make('site/promoters/index', compact('awsinit', 'policy', 'signature'));
    }

    public function isPromoterDataComplete($user)
    {
        // check personal data
        if(empty($user->personal_phone))
        {
            eerror_log("No phone");
            return false;
        }

        // check company data
        $user_company = $user->company()->first();
        if($user_company)
        {
            if(empty($user_company->name) || empty($user_company->type) || empty($user_company->bank_details) || empty($user_company->tax_number))
            {
                eerror_log("No company data");
                return false;
            }

            // check address
            $company_address = $user_company->address()->first();
            if(!$company_address)
            {
                eerror_log("No company address");
                return false;
            }

            if(empty($company_address->address) || empty($company_address->postal_code) || empty($company_address->city) || empty($company_address->state_province)
                || empty($company_address->country_id) || empty($company_address->phone))
            {
                eerror_log("No company address data");
                return false;
            }
        }

        return true;
    }

    public function getRegistration()
    {
        $user = Auth::user();
        $user_company = (!$user ? null : $user->company()->first());
        $user_event = (!$user ? null : $user->events()->first());

        if(!$user->hasRole('promoter')) {
            return View::make('site/promoters/registration/errors')->with('reg_errors', "Nothing to do here. You are not a promoter");
        }

        if(!$user_company) {
            return View::make('site/promoters/registration/errors')->with('reg_errors', "Nothing to do here. You are not associated with a company");
        }

        $company_name = (!$user_company ? 'Warning: You are not associated with any company' : $user_company->name);

        return View::make('site/promoters/registration/index')->with('company_name', $company_name);
    }


    // same logic ???
    // A promoter can be associated with an event but not with a company so I gues not
    public function getEvents() {

        /*
            Get all events asociated with logged in promoter
         */

        //check if user is authenticated
        $auser = Auth::user();
        if(!$auser)
        {
            eerror_log('user not authenticated');
            return Response::json((object) null);
        }

        // storage
        $all_user_events = [];

        ////////////////////////////////
        // associated through company //
        ////////////////////////////////
        $user = User::find($auser->id);
        if(!$user)
        {
            eerror_log('could not find user');
            return Response::json((object) null);
        }
        // non fatal - no company associated
        if(!$user->company()->first())
        {
            eerror_log('no company associated with user');
        }
        if($user && $user->company()->first())
        {
            eerror_log('company found');
            // get them all
            $user_companies = $user->company()->get();
            foreach ($user_companies as $company_ndx => $company_val)
            {
                // get associated events
                $tmp_company_events = $company_val->events()->get();
                eerror_log('>>> company '.json_encode($company_val));
                eerror_log('>>> company events '.json_encode($tmp_company_events));
                foreach ($tmp_company_events as $cevents_ndx => $cevents_val)
                {
                    // dump them
                    $all_user_events[] = $cevents_val;
                }
            }
        }

        /////////////////////
        // associated with //
        /////////////////////
        $user_events = $user->events()->get();
        foreach ($user_events as $user_eventsr_key => $user_event)
        {
            $all_user_events[] = $user_event;
            Debugbar::info('added event user', $user_event);
        }

        ////////////////
        // created by //
        ////////////////
        $events_created_by_user = Events::where('created_by', $user->id)->get();
        foreach ($events_created_by_user as $events_created_by_user_key => $events_created_by_user_value)
        {
            $all_user_events[] = $events_created_by_user_value;
        }

        $resp = [];
        $company_events = null;
        if(count($all_user_events) > 0)
        {
            foreach ($all_user_events as $event_ndx => $curr_event)
            {
                $event_details = $this->getDetails($curr_event);
                if(strtotime($event_details['date']) < strtotime('now'))
                {
                    eerror_log('>>>>>>>>>>>> Event Date is in the past '.json_encode($event_details['date']));
                   continue;
                }

                $cats                    = $this->getTaskCategories();
                $company_events[]        = $curr_event;
                $event_tasks             = $this->getTasks($curr_event);
                $categorized_event_tasks = $this->getCategorizedTasks($curr_event);

                // Le tickets
                list($ticket_types, $ticket_aggregate, $yearly_tickettype_aggregate, $global_aggregate) = $this->getTickets($curr_event);

                // calc cumulative task updates for current event
                $event_updates_files    = 0;
                $event_updates_comments = 0;
                foreach ($event_tasks as $task_ndx => $curr_task)
                {
                    if($curr_task['info']['status'] === "incomplete")
                    {
                        $event_updates_files += (int) $curr_task['info']['cnt_updated_files'];
                        $event_updates_comments += (int) $curr_task['info']['cnt_updated_comments'];
                    }
                }


                $resp[] = [ 'cats' => $cats,
                            'currencies' => $this->getCurrencies(),
                            'cat_tasks' => $categorized_event_tasks,
                            'details' => $event_details,
                            'due_date' => strtotime($event_details['deadline']),
                            'event' => $curr_event,
                            'logged_in_id' => $user->id,
                            'tasks' => $event_tasks,
                            'ticket_types' => $ticket_types,
                            'tickets' => $ticket_aggregate,
                            'tickets_yearly' => $yearly_tickettype_aggregate,
                            'global_sales' => $global_aggregate,
                            'updated_files' => $event_updates_files,
                            'updated_comments' => $event_updates_comments];
            }
        }

        return Response::json($resp);
    }

    public function getTickets($curr_event)
    {
        $curr_year = (int) date('Y', strtotime('now'));
        $curr_week = (int) date('W', strtotime('now'));

        $event_ticketsystem_startdate = $curr_event->ticketsystem_recording_startdate;
        $event_ts_startyear           = (int) date('Y', strtotime($event_ticketsystem_startdate));
        $event_ts_startweek           = (int) date('W', strtotime($event_ticketsystem_startdate));

        $ticket_types                = TicketType::where('events_id', $curr_event->id)->orderBy('order')->get();
        $ticket_aggregate            = [];
        $yearly_tickettype_aggregate = [];

        $global_aggregate = (object) ['num_sold' => 0, 'amt' => 0, 'points' => null, 'cum_points' => null];
        $global_aggregate->points = [];
        $global_aggregate->cum_points = [];

        // yearly aggregates
        foreach ($ticket_types as $key => $tt) {

            $tmp_yearly_tickettype = (object) ['id' => $tt->id, 'name' => $tt->name, 'num_sold' => 0, 'amt' => 0, 'points' => null, 'sales_points' => null];
            $tmp_yearly_tickettype->points = [];
            $tmp_yearly_tickettype->sales_points = [];
            $yearly_tickettype_aggregate[] = $tmp_yearly_tickettype;
        }

        // years
        for($y = $event_ts_startyear; $y <= $curr_year; $y++)
        {
            // last week for current year
            $last_week_dt = new DateTime('December 28th, '.$y);
            $last_week    = ($y === $curr_year ? $curr_week : (int) $last_week_dt->format('W'));
            $start_week   = ($y === $event_ts_startyear ? $event_ts_startweek : 1);

            // weeks
            for($w = $start_week; $w <= $last_week; $w++)
            {
                // tmp storage for all ticket types for a given week
                $tmp_ticket_aggregate = (object)['week_ndx' => $w, 'year' => $y,  'ticket_details' => null, 'weekly_totals' => null];
                $tmp_ticket_aggregate->ticket_details = [];

                // tmp weekly cumulative counter vars for all ticket types
                $weekly_total_sold    = 0;
                $weekly_total_revenue = 0;

                // for each ticket type
                $tmp_global_point = 0;
                foreach ($ticket_types as $key => $ticket_type)
                {
                    $curr_tickets_sold = TicketSold::where('event_ticket_types_id', $ticket_type->id)
                                    ->where('week', $w)
                                    ->where('year', $y)
                                    ->first();

                    // find the yearly ticket_type ndx
                    $yearly_tt_ndx = -1;
                    foreach ($yearly_tickettype_aggregate as $key => $yearly_tickettype_value)
                    {
                        if($yearly_tickettype_value->id === $ticket_type->id)
                        {
                            $yearly_tt_ndx = $key;
                            break;
                        }
                    }

                    if($curr_tickets_sold)
                    {
                        eerror_log('Event '.$curr_event->id.' has ticketssold for '.$w.'-'.$y.' '.json_encode($curr_tickets_sold));

                        // update weekly accumulators
                        $curr_ticket_price    = (double)$ticket_type->price;
                        $weekly_total_sold    += (int)$curr_tickets_sold->num_sold;
                        $weekly_total_revenue += ((int)$curr_tickets_sold->num_sold * $curr_ticket_price);

                        // update yearly accumulators
                        if($yearly_tt_ndx !== -1)
                        {
                            $revenue =  (double)$curr_tickets_sold->num_sold * $curr_ticket_price;
                            $yearly_tickettype_aggregate[$yearly_tt_ndx]->num_sold += (int)$curr_tickets_sold->num_sold;
                            $yearly_tickettype_aggregate[$yearly_tt_ndx]->amt      += $revenue;
                            $yearly_tickettype_aggregate[$yearly_tt_ndx]->points[] = (int)$curr_tickets_sold->num_sold;
                            $yearly_tickettype_aggregate[$yearly_tt_ndx]->sales_points[] = $revenue;

                            $tmp_global_point += $revenue;
                        }
                    }
                    else if($yearly_tt_ndx !== -1)
                    {
                        // set to 0 if no tt sale exists
                        $yearly_tickettype_aggregate[$yearly_tt_ndx]->points[]       = 0;
                        $yearly_tickettype_aggregate[$yearly_tt_ndx]->sales_points[] = 0;
                    }

                    // save resuts for current ticket type
                    $tmp_ticket_aggregate->ticket_details[] = ['ticket_type' => $ticket_type, 'tickets_sold' => $curr_tickets_sold, 'input_visible' => (!$curr_tickets_sold ? true : false)];
                }

                // save weekly accumulators
                $tmp_ticket_aggregate->weekly_totals = ['num_sold' => $weekly_total_sold, 'amt' => $weekly_total_revenue];
                $ticket_aggregate[] = $tmp_ticket_aggregate;
                $global_aggregate->points[] = $tmp_global_point;

                $num_points = count($global_aggregate->points);
                if($num_points === 0)
                {
                    $global_aggregate->cum_points[] = $tmp_global_point;
                }
                else if($num_points > 0)
                {
                    $prev_val = end($global_aggregate->cum_points);
                    $global_aggregate->cum_points[] = $prev_val + $tmp_global_point;
                }
            }
        }

        return [$ticket_types, $ticket_aggregate, $yearly_tickettype_aggregate, $global_aggregate];
    }

    public function getCurrencies() {

        return Currency::all();
    }

    public function getTaskCategories()
    {
        return TaskGroup::orderBy('order')->get();
    }

    public function JSONTaskCategories()
    {
        $task_groups = TaskGroup::orderBy('order')->get();

        return Response::json($task_groups);
    }

    public function convertDate($date_str)
    {
        if (!$date_str)
        {
            return null;
        }

        $tmp_date = explode("-", $date_str);
        $ret = $tmp_date[2]."-".$tmp_date[1]."-".$tmp_date[0];

        eerror_log('>>> Le date STR '.$ret);

        return $ret;
    }

    public function getTasks($model) {

        /*
            Get tasks asociated with a given event
         */

        $event_tasks = TaskEvent::where('events_id', $model->id)
                            ->get();

        $resp = [];
        foreach ($event_tasks as $event_task_ndx => $curr_task)
        {
            $task_files = TaskFile::selectRaw('taskfiles.*, users.username')
                            ->join('users', 'taskfiles.users_id', '=', 'users.id')
                            ->where('taskevents_id', $curr_task->id)
                            ->get();

            $resp[] = ['info' => $curr_task, 'files' => $task_files];
        }

        return $resp;
    }

    public function getCategorizedTasks($model)
    {
        $categorized_event_tasks = [];
        $task_groups = TaskGroup::orderBy('order')->get();

        $group_ndx = 1;
        foreach ($task_groups as $key => $tg) {

            if($group_ndx > 4)
                break;

            $cat_tasks = TaskEvent::where('events_id', $model->id)
                            ->where('group_id', $tg->id)
                            ->get();

            $categorized_event_tasks['group_'.$tg->id] = [];
            foreach ($cat_tasks as $cat_task_ndx => $curr_task)
            {
                $task_files = TaskFile::where('taskevents_id', $curr_task->id)->get();
                $categorized_event_tasks['group_'.$tg->id][] = ['info' => $curr_task, 'files' => $task_files];
            }

            $group_ndx++;
        }

        return $categorized_event_tasks;
    }

    public function getDetails($model)
    {
        /*
            Get details associated with a given event
        */

        $event_date_col = $model->date()->first();
        $event_date = ($event_date_col ? $event_date_col->datetime_start->format('Y-m-d') : null);
        $event_deadline = TaskEvent::select('due_date')
                            ->where('events_id', $model->id)
                            ->whereNotNull('due_date')
                            ->orderBy('due_date', 'ASC')
                            ->first();

        $all_event_deadline = TaskEvent::select('due_date')
                            ->where('events_id', $model->id)
                            ->orderBy('due_date', 'ASC')
                            ->get();

        //eerror_log('ED '.json_encode($all_event_deadline));

        $model_venue = $model->venues()->first();
        if(!$model_venue)
        {
            $event_location = 'unknown';
        }
        else
        {
            if(!($model_venue->address))
            {
                $event_location = 'unknown';
            }
            else
            {
                $venue_address  = $model_venue->address;
                $event_location = $model_venue->address->city.' ('.$model_venue->address->country->abbreviation.')';
            }
        }

        $task_groups = TaskGroup::orderBy('order')->get();
        $event_completion = [];
        $event_completion_data = [];

        $group_ndx = 1;
        foreach ($task_groups as $key => $tg) {

            if($group_ndx > 4)
                break;

            $completed = TaskEvent::where('events_id', $model->id)
                            ->where('group_id', $tg->id)
                            ->where('status', 'complete')
                            ->where('active', 1)
                            ->count();

            $total = TaskEvent::where('events_id', $model->id)
                            ->where('group_id', $tg->id)
                            ->where('active', 1)
                            ->count();

            $event_completion['group'.$tg->id] = [];
            $event_completion['group'.$tg->id]['completed'] = $completed;
            $event_completion['group'.$tg->id]['total']     = $total;
            $event_completion['group'.$tg->id]['name']      = $tg->name;
            $event_completion['group'.$tg->id]['order']     = $tg->order;


            // same in a more convenient format
            $event_completion_data[] = (object) ['id' => $tg->id,
                'name'      => $tg->name,
                'order'     => $tg->order,
                'completed' => $completed,
                'total'     => $total
            ];

            $group_ndx++;
        }

        $resp = ['date' => $event_date,
            'location'   => $event_location,
            'deadline'   => ($event_deadline ? date("Y-m-d", strtotime($event_deadline->due_date)) : 'UNK'),
            'completion' => $event_completion,
            'data'       => $event_completion_data
        ];

        return $resp;
    }

    // COMPANY
    public function getRegistrationCompany()
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $user_company = $user->company()->first();
        if(!$user_company)
        {
            return Response::make('Error: No company associated with user', 500);
        }

        $company_address = $user_company->address()->first();
        if(!$company_address)
        {
            return Response::make('Error: No address associated with user company', 500);
        }

        return Response::json(['company_address' => $company_address, 'user_company' => $user_company]);
    }

    public function postRegistrationCompany()
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $user_company = $user->company()->first();
        $all_input = Input::all();
        if(!isset($all_input['company_bank_details']) || !isset($all_input['company_tax_number']))
        {
            return Response::make('Error incomplete info', 500);
        }

        $user_company->bank_details = $all_input['company_bank_details'];
        $user_company->tax_number   = $all_input['company_tax_number'];
        if(isset($all_input['notes']))
        {
            $user_company->notes = $all_input['notes'];
        }

        $user_company->save();
        $company_address = $user_company->address()->first();
        if(!$company_address)
        {
            $company_address = new Address;
        }

        $all_input = Input::all();
        if(!isset($all_input['address']))
        {
            return Response::make('Error incomplete info: address', 500);
        }
        if(!isset($all_input['post_code']))
        {
            return Response::make('Error incomplete info: post_code', 500);
        }
        if(!isset($all_input['city']))
        {
            return Response::make('Error incomplete info: city', 500);
        }
        if(!isset($all_input['country_id']))
        {
            return Response::make('Error incomplete info: country_id', 500);
        }
        if(!isset($all_input['state_province']))
        {
            return Response::make('Error incomplete info: state_povince', 500);
        }
        if(!isset($all_input['phone']))
        {
            return Response::make('Error incomplete info: phone', 500);
        }
        if(!isset($all_input['website']))
        {
            return Response::make('Error incomplete info: website', 500);
        }

        $company_address->address        = $all_input['address'];
        $company_address->postal_code    = $all_input['post_code'];
        $company_address->city           = $all_input['city'];
        $company_address->country_id     = $all_input['country_id'];
        $company_address->state_province = $all_input['state_province'];
        $company_address->phone          = $all_input['phone'];
        $company_address->website        = $all_input['website'];

        if(isset($all_input['fax']))
        {
            $company_address->fax = $all_input['fax'];
        }

        $company_address->save();

        eerror_log(json_encode($company_address));

        // associate address with company
        $user_company->address()->associate($company_address);
        $user_company->update();



        return Response::make('OK', 200);
    }


    // PERSONAL
    public function getRegistrationPersonal()
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        return Response::json($user);
    }

    public function postRegistrationPersonal()
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $all_input = Input::all();
        if(isset($all_input['personal_phone']))
        {
            DB::statement('UPDATE users SET personal_phone = "' . $all_input['personal_phone'] . '" WHERE id = ' . Auth::user()->id);
            return Response::make('OK', 200);
        }

        return Response::make('Error incomplete info', 500);
    }

    // promoter venue details
    public function postVenue($event)
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $all_input = Input::all();
        eerror_log('>>> Venue Posted Curfew'.json_encode(Input::get('curfew')));

        $curfew_valid = false;
        if(Input::get('curfew'))
        {
            $exploded_curfew = explode("T", Input::get('curfew'));
            if(count($exploded_curfew) > 1)
            {
                $curfew_time = explode(":", $exploded_curfew[1]);
                $event->curfew = $curfew_time[0].':'.$curfew_time[1];
                $curfew_valid = true;
            }
        }

        if(!$curfew_valid)
        {
            $event->curfew = "00:00";
        }

        $event->minimal_age_limit                   = Input::get('minimal_age_limit');

        if(empty($event->curfew) || empty($event->minimal_age_limit))
        {
            return Response::make('Incomplete Info', 500);
        }

        $event->alcohol_license                     = Input::get('alcohol_license');
        $event->restrictions_on_merchandise_sales   = Input::get('restrictions_on_merchandise_sales');
        $event->sound_restrictions                  = Input::get('sound_restrictions');
        $event->booked_for_setup_from               = Input::get('booked_for_setup_from');
        $event->booked_for_break_until              = Input::get('booked_for_break_until');

        eerror_log('Event '.json_encode($event));
        eerror_log('AI '.json_encode($all_input));

        $event->update();

        return Response::make('OK', 200);
    }

    // promoter hospitality details
    public function postHospitality($event)
    {
        $user = Auth::user();
        if(!$user)
        {
            return Response::make('Permission required', 403);
        }

        $all_input = Input::all();
        //error_log('AI '.json_encode($all_input));

        $event->hotel1_name = Input::get('hotel1_name');
        $event->hotel2_name = Input::get('hotel2_name');
        $event->hotel1_website = Input::get('hotel1_website');
        $event->hotel2_website = Input::get('hotel2_website');
        $event->hotel1_travel_time_from_airport = Input::get('hotel1_travel_time_from_airport');
        $event->hotel2_travel_time_from_airport = Input::get('hotel2_travel_time_from_airport');
        $event->hotel1_travel_time_from_venue = Input::get('hotel1_travel_time_from_venue');
        $event->hotel2_travel_time_from_venue = Input::get('hotel2_travel_time_from_venue');

        $event->update();

        return Response::make('OK', 200);
    }


    // ticket ales
    public function postTicketSales($ev)
    {
        $all_input = Input::all();
        eerror_log('>>>> TSAI '.count($all_input['sales_data']).' --- '.json_encode($all_input['sales_data']));

        foreach ($all_input['sales_data'] as $key => $sales_ttype_data)
        {
            if(!isset($sales_ttype_data['sold']) || !is_numeric($sales_ttype_data['sold']))
            {
                eerror_log('>> invalid sold '.json_encode($sales_ttype_data['sold']));
                continue;
            }

            // get the ticket type to dicount sold tickets
            $curr_ticket_type = TicketType::find((int)$sales_ttype_data['ttype_id']);
            if(!$curr_ticket_type)
            {
                eerror_log('>>>> could not find ticket type');
                return Response::make('could not find ticket type', 500);
            }

            // discount
            $curr_ticket_type->num_available -= (int)$sales_ttype_data['sold'];
            $curr_ticket_type->update();

            $sale_date = new DateTime();
            $sale_date->setISODate((int)$sales_ttype_data['year'], (int)$sales_ttype_data['week']);
            $sales_date_ts = $sale_date->format('Y-m-d');


            eerror_log('>>> Sales '.$sales_date_ts.' - '.$sales_ttype_data['week']);

            $ttype_sales_entry = TicketSold::firstOrCreate(['week' => $sales_ttype_data['week'],
                                                            'year' => $sales_ttype_data['year'],
                                                            'sale_date' => $sales_date_ts,
                                                            'event_ticket_types_id' => $sales_ttype_data['ttype_id']]);

            $ttype_sales_entry->num_sold = (int)$sales_ttype_data['sold'];
            $ttype_sales_entry->update();

            eerror_log('saved ticket entry '.json_encode($ttype_sales_entry));

        }

        return Response::make('OK', 200);
    }

    public function getMissingSales($autologin_token)
    {
        eerror_log('Sales autologin'.json_encode($autologin_token));

        // logout
        Auth::logout();

        $missing_sales_autologin_entry = TicketSalesAutologin::where('token', $autologin_token)->first();
        if(!$missing_sales_autologin_entry)
        {
            return Redirect::To('/');
        }
        else
        {
            $user = User::find($missing_sales_autologin_entry->users_id);
            Auth::loginUsingId($user->id);
            $event_id = $missing_sales_autologin_entry->events_id;
            $missing_sales_autologin_entry->update(['token' => null]);

            return Redirect::to('/my-events/'.$event_id.'/tickets');
        }
    }

    public function getNotifications($autologin_token)
    {
        eerror_log('Task Notifications autologin'.json_encode($autologin_token));

        // logout
        Auth::logout();

        $missing_sales_autologin_entry = TaskNotificationAutologin::where('token', $autologin_token)->first();
        if(!$missing_sales_autologin_entry)
        {
            return Redirect::To('/');
        }
        else
        {
            $user = User::find($missing_sales_autologin_entry->users_id);
            Auth::loginUsingId($user->id);

            $event_id = $missing_sales_autologin_entry->events_id;
            $task_id = $missing_sales_autologin_entry->taskevents_id;

            $missing_sales_autologin_entry->update(['token' => null]);

            return Redirect::to('/my-events/'.$event_id.'/dashboard?taskId='.$task_id);
        }
    }
}

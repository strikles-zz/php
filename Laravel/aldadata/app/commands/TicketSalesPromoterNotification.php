<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TicketSalesPromoterNotification extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'promoters:notify';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Notify promoters by mail of unfilled event ticket sales.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info("searching for event candidates...");

		// get all relevant events
		$all_events = Events::where('ticketsystem_enabled', 1)
						->where('ticketsystem_autoremind', 1)
						//->where('ticketsystem_locked_for_promoter', '!=', 1)
						->whereNotNull('ticketsystem_autoremind_user_id')
						->whereNotNull('ticketsystem_recording_startdate')
						->get();

		error_log('All Events '.json_encode($all_events));

		$curr_year = date("Y", strtotime('now'));
		$curr_week = date("W", strtotime('now'));

		// iterate to get at the event ticket types without sales
		foreach ($all_events as $key => $curr_event)
		{
			$this->info("event with ticketsystem enabled found...");

			// event ticket types
			$ticket_types = $curr_event->ticket_types()->get();
			$event_has_incomplete_sales = false;
			foreach ($ticket_types as $key => $tt)
			{
				// No point sending multiple notifications for same event and different ticket types
				if($event_has_incomplete_sales)
				{
					break;
				}

				$this->info("searching event ticket types...");
				for($days_added = 0; ;$days_added += 7)
				{
					$cmp_ts = strtotime($curr_event->ticketsystem_recording_startdate." +".$days_added." days");
					if($cmp_ts > strtotime('now'))
						break;

					// get the week and year
					$cmp_year = date("Y", $cmp_ts);
					$cmp_week = date("W", $cmp_ts);

					// get the ones without sales entries at some week between ticketsystem startdate and now
					$tt_weekly_sales = TicketSold::where('event_ticket_types_id', $tt->id)
													->where('week', $cmp_week)
													->where('year', $cmp_year)
													->first();

					if(!$tt_weekly_sales)
					{
						$this->comment("notifying promoter...");

						// get the user to be notified
						$promoter = User::find($curr_event->ticketsystem_autoremind_user_id);

						// create autologin entry
						$confirmation_code = str_random(30);
						$autologin_entry = TicketSalesAutologin::create(['users_id' => $promoter->id, 'events_id' => $curr_event->id, 'token' => $confirmation_code]);
						if($autologin_entry)
						{
							// send notification
			                Mail::send('emails.promoters.incomplete_sales', array('promoter' => $promoter, 'curr_event' => $curr_event, 'autologin' => $autologin_entry), function($message) use ($promoter)
			                {
			                    $message->to($promoter->email, $promoter->username)->subject("Alda: Incomplete ticket sales");
			                });
						}

		                $event_has_incomplete_sales = true;
		                break;
					}
				}
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}

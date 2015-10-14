<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RenewWithstandingSubscriptions extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'subscriptions_renew';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Renew all withstanding subscriptions (i.e. where end date > current date).';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function log_msg($msg, $browser_debug, $type = 'info')
	{
		if($browser_debug)
		{
			echo("<br/>$msg");
		}
		elseif($type === 'error')
		{
			self::error("$msg");
		}
		elseif($type === 'comment')
		{
			self::comment("$msg");
		}
		elseif($type === 'question')
		{
			self::question("$msg");
		}
		else
		{
			self::info("$msg");
		}
	}

	public function processSubscriptions($status_id, $browser_debug = false)
	{
		if($status_id === Config::get('eenvoudcrm.subscriptions_status_terminated.id') || $status_id === Config::get('eenvoudcrm.subscriptions_status_ended.id'))
		{
			$this->log_msg('Error: The Provided subscription status_id is non-renewable', $browser_debug, 'error');
			return;
		}

		$dateIntervals = Config::get('eenvoudcrm.subscriptions_dateintervals');
        $withstanding_subscriptions = Subscription::where('subscription_end', '<', date('Y-m-d'))
                                        ->where('status_id', '=', $status_id)
                                        ->get();

        $results_exist = count($withstanding_subscriptions) > 0;
        $this->log_msg(">>> ".count($withstanding_subscriptions)." ".$dateIntervals[$status_id]." subscriptions to renew", $browser_debug, ($results_exist ? 'question' : 'comment'));

        foreach ($withstanding_subscriptions as $curr_ndx => $curr_subscription)
        {
	        if(!array_key_exists($curr_subscription->status_id, $dateIntervals))
	        {
	            // what to do ???
	            $this->log_msg('Error: Invalid status_id for subscription $curr_subscription->id - $curr_subscription->status_id', $browser_debug, 'error');
	            return;
	        }

            $new_subscription = clone $curr_subscription;
            unset($new_subscription->id);

            $new_subscription->subscription_start = date("Y-m-d", strtotime($curr_subscription->subscription_end . " +1 day"));
            $new_subscription->subscription_end   = date("Y-m-d", strtotime($curr_subscription->subscription_end . $dateIntervals[$curr_subscription->status_id]));

            $new_subscription->invoice_id         = null;
            $new_subscription->status_date        = date("Y-m-d");
            // prices update ???
            //$new_subscription->save();

            // disable old subscription
			$curr_subscription->status_id   = Config::get('eenvoudcrm.subscriptions_status_ended.id');
			$curr_subscription->status_date = date("Y-m-d");
            //$curr_subscription->save();

            $old_msg = "OLD - Start:".$curr_subscription->subscription_start." End: ".$curr_subscription->subscription_end." Status: ".$curr_subscription->status_id." Status Date: ".$curr_subscription->status_date;
            $this->log_msg($old_msg, $browser_debug, 'error');

            $new_msg = "NEW - Start:".$new_subscription->subscription_start." End: ".$new_subscription->subscription_end." Status: ".$new_subscription->status_id." Status Date: ".$new_subscription->status_date;
            $this->log_msg($new_msg, $browser_debug, 'info');
        }

        if($results_exist)
        {
        	$this->log_msg("", $browser_debug);
        }
	}
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$browser_debug = $this->argument('browser_debug');

        self::processSubscriptions(Config::get('eenvoudcrm.subscriptions_status_yearly.id'), $browser_debug);
        self::processSubscriptions(Config::get('eenvoudcrm.subscriptions_status_trimestral.id'), $browser_debug);
        self::processSubscriptions(Config::get('eenvoudcrm.subscriptions_status_quarterly.id'), $browser_debug);
        self::processSubscriptions(Config::get('eenvoudcrm.subscriptions_status_monthly.id'), $browser_debug);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('browser_debug', InputArgument::OPTIONAL, 'html line breaks.', false),
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

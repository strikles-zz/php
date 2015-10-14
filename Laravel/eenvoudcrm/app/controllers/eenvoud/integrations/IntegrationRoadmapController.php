<?php

class IntegrationRoadmapController extends AdminController
{

	const host = 'https://api.ppmroadmap.com/';
	const user = 'xxxxxxx';
	const pass = 'xxxxxxx';

	/**
	 * [getProjects - get all the projects]
	 * @return [array] [response]
	 */
	public static function getProjects()
	{
		$action   = 'v1.2/project';
		$curr_uri = self::host.$action;

	    $response = \Httpful\Request::get($curr_uri)
	        ->authenticateWith(self::user, self::pass)
	        ->send();

	    $ret = [];
	    if (!$response->hasErrors() && $response->hasBody())
	    {
	    	$ret = [true, $response->body];
	    }
	    else
	    {
	        error_log("ERROR (getProjects): ".json_encode($response->code));
	        $ret = [false, $response->code];
	    }

	    return $ret;
	}

	/**
	 * [getProject - get a project by ID]
	 * @param  [int] $project_id 	[roadmap project id]
	 * @return [array]         		[reponse] ¨
	 */
	public function getProject($project_id)
	{
		$action   = "v1.2/project/$project_id";
		$curr_uri = self::host.$action;

	    $response = \Httpful\Request::get($curr_uri)
	        ->authenticateWith(self::user, self::pass)
	        ->send();

	    $ret = [];
	    if (!$response->hasErrors() && $response->hasBody())
	    {
	    	$ret = [true, $response->body];
	    }
	    else
	    {
	        error_log("ERROR (getProject): ".json_encode($response->code));
	        $ret = [false, $response->code];
	    }

	    return $ret;
	}

	/**
	 * [getProjectWorklogEntries - the actual api request to get all entries between lower and upper date interval bounds]
	 * @param  [int] 	$project_id [roadmap project id]
	 * @param  [string] $start_date [lower bound]
	 * @param  [string] $end_date   [upper bound]
	 * @return [array]             	[response]
	 */
	public static function getProjectWorklogEntries($project_id, $start_date, $end_date)
	{
		$action   = "v1.2/project/".$project_id."/timeentry/".$start_date."/".$end_date;
		$curr_uri = self::host.$action;

	    $response = \Httpful\Request::get($curr_uri)
	        ->authenticateWith(self::user, self::pass)
	        ->send();

	    $ret = [];
	    if (!$response->hasErrors())
	    {
	    	$ret = [true, $response->body];
	    }
	    else
	    {
	        error_log("ERROR (getProjectWorklogEntries): ".json_encode($response->body));
	        $ret = [false, $response];
	    }

	    //mail('andre@eenvoudmedia.nl', 'roadmap entries', json_encode($response->body));
	    return $ret;
	}

	/**
	 * [processRoadmapWorklogs - process withstanding roadmap logs]
	 * @return [array] [the roadmap entries]
	 */
	public static function processRoadmapWorklogs()
	{
	    // dates
	    $today     = date("Ymd");
	    $yesterday = date("Ymd", strtotime("yesterday"));

	    // time entries
	    $roadmap_project_id = Config::get('eenvoudcrm.main_roadmap_project_id');
	    list($worklog_entries_status, $worklog_entries) = IntegrationRoadmapController::getProjectWorklogEntries($roadmap_project_id, $yesterday, $today);

	    if($worklog_entries_status)
	    {
		    // foreach of the entries create a new worklog and save it
		    foreach ($worklog_entries as $key => $value)
		    {
		    	// check if this ID is unique
				$roadmap_id       = $value->ID;
				$roadmap_worklogs = Werklog::where('roadmap_id', '=', $roadmap_id)->first();

		    	if(!$roadmap_worklogs)
		    	{
					$worklog             = new Werklog();
					$date                = explode("T", $value->Date, 2);
					$worklog->date       = $date[0];
					$worklog->roadmap_id = (int)$value->ID;

			        // default project and company ID
					$worklog->project_id = null;
					$worklog->company_id = Config::get('eenvoudcrm.default_company_id');

					//mail('andre@eenvoudmedia.nl', 'resource_id', $value->Resource->ID);
			        $user = User::where('roadmap_resource_id', '=', $value->Resource->ID)->first();
			        if($user)
			        {
			            $worklog->user_id = $user->id;
			        }
			        else
			        {
			            $worklog->user_id = Config::get('eenvoudcrm.default_user_id');
			        }

					$worklog->minutes     = round(((float)$value->Time)*60.0);
					$worklog->description = $value->Description;
					$worklog->billable    = 1;
					$worklog->processed   = 0;
					$worklog->save();
			    }
			    else
			    {
			    	error_log('Roadmap worklogs: Skipping duplicated entry '.$roadmap_id);
			    }
		    }

			return $worklog_entries;
		}

		return false;
	}
}

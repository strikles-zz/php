<?php

class IntegrationJIRAController extends AdminController
{

	/**
	 * [store - jira weebhook handler]
	 * @return [void] []
	 */
	public function store()
	{
		$post_data = file_get_contents("php://input");
		mail('andre@eenvoudmedia.nl', 'jira_posted_data', $post_data);

		$reply     = json_decode($post_data);
		$status_id = $reply->issue->fields->status->id;

		//error_log('status_id: '.$status_id);
		if($status_id === Config::get('eenvoudcrm.jira_status_closed') || $status_id === Config::get('eenvoudcrm.jira_status_done'))
		{
			mail('andre@eenvoudmedia.nl', 'jira_new_worklog', $post_data);

			$worklog = new Werklog();

			$worklog->description = 'Issue '.$reply->issue->id.' - '.$reply->issue->fields->summary;
			$worklog->minutes     = (int)$reply->issue->fields->timetracking->timeSpentSeconds / 60.0;
			$worklog->date        = date("Y-m-d");
			$worklog->billable    = 1;

			$jira_username = $reply->user->name;
			$user = User::whereRaw("username like '%".$jira_username."%'")->first();
			if($user)
			{
				$worklog->user_id = $user->id;
			}
			else
			{
				$worklog->user_id = Config::get('eenvoudcrm.default_user_id');
			}

			$jira_id = $reply->issue->fields->project->id;
			$project = Project::where('jira_id', '=', $jira_id)->first();
			if($project)
			{
				$worklog->company_id = $project->company_id;
				$worklog->project_id = $project->id;
			}
			else
			{
				$worklog->company_id = Config::get('eenvoudcrm.default_company_id');
				$worklog->project_id = Config::get('eenvoudcrm.default_project_id');
			}

			try
			{
				$worklog->save();
			}
			catch (Exception $e)
			{
				error_log(json_encode($e));
			}
		}
	}
}

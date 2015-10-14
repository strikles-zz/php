<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;

class AdminReminderController extends AdminCRUDController
{

	public function __construct()
    {
		$this->name = 'reminders';
		$this->modelName = 'Reminder';
		$this->singleName = 'reminder';

		$this->validationRules = [
            'description' => 'required'
    	];
    	$this->validationMessages = [
            'description.required' => 'description is a required field'
    	];

    	$this->dataTableColumns = ['id', 'project_id', 'user_id', 'description'];
	}

    /**
     * [saveModel]
     * @param  boolean $reminder [description]
     * @return [type]            [description]
     */
    protected function saveModel($reminder = false)
    {
        if (Input::get('id')) {
            $reminder = Reminder::find(Input::get('id'));
        }
        if (!$reminder) $reminder = new Reminder();

        //$load_company_model = $project->company;
        $reminder->project_id   = Input::get('project_id');
        $reminder->user_id      = Input::get('user_id');
        $reminder->description  = Input::get('description');
        $reminder->save();

        return $reminder;

    }

    /**
     * [getData]
     * @return [type] [description]
     */
    public function getData()
    {

        $Model = $this->modelName;
        $all_reminders = $Model::all($this->dataTableColumns);

        $data = [];
        foreach($all_reminders as $reminder)
        {
            // load relations
            $load_curr_project  = $reminder->project;
            $load_curr_user     = $reminder->user;

            $curr_reminder = $reminder;
            Debugbar::info($reminder);
            if(isset($reminder->user_id) && isset($reminder->project_id))
            {
                $curr_proj      = (object) ['id' => $reminder->reminder_id, 'name' => $reminder->project->name];
                $curr_user      = (object) ['id' => $reminder->user_id, 'username' => $reminder->user->username];
                $curr_entry     = (object) ['DT_RowId' => 'row_'.$reminder->id, 'reminders' => $curr_reminder, 'users' => $curr_user, 'projects' => $curr_proj];
                $data[]         = $curr_entry;
            }
        }

        $all_projects  = Project::orderBy('name', 'DESC')->get(['id', 'name']);
        $projects      = [];
        foreach($all_projects as $project)
        {
            $tmp_project   = (object) ['value' => $project->id, 'label' => $project->name];
            $projects[]    = $tmp_project;
        }

        $all_users  = User::all(['id', 'username']);
        $users      = [];
        foreach($all_users as $user)
        {
            $tmp_user   = (object) ['value' => $user->id, 'label' => $user->username];
            $users[]    = $tmp_user;
        }

        $ret = [ 'data' => $data, 'projects' => $projects, 'users' => $users ];

        return Response::json($ret);
    }

    /**
     * [postData]
     * @return [type] [description]
     */
    public function postData()
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'reminders' )
            ->fields(
                Field::inst( 'reminders.id' ),
                // Project
                Field::inst( 'reminders.project_id' ),
                Field::inst( 'projects.name' ),
                // User
                Field::inst( 'reminders.user_id' ),
                Field::inst( 'users.username' ),
                // Description
                Field::inst( 'reminders.description' )
            )
            ->leftJoin( 'users', 'users.id', '=',  'reminders.user_id')
            ->leftJoin( 'projects', 'projects.id', '=',  'reminders.project_id')
            ->process( $_POST )
            ->data();
            //->json;

        $data['projects'] = $db
            ->selectDistinct( 'projects', 'id as value, name as label' )
            ->fetchAll();

        $data['users'] = $db
            ->selectDistinct( 'users', 'id as value, username as label' )
            ->fetchAll();

        //echo json_encode($ret);
        return Response::json($data);
    }
}

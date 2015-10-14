<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;

class AdminWerklogController extends AdminCRUDController
{

    public function __construct()
    {
        $this->name         = 'werklogs';
        $this->modelName    = 'Werklog';
        $this->singleName   = 'werklog';

        $this->validationRules = [
            'project_id' => 'required'
        ];

        $this->validationMessages = [
            'project_id.required' => 'Project is a required field'
        ];

        $this->dataTableColumns = ['id', 'date', 'company_id', 'project_id', 'strippenkaarten_id', 'user_id', 'minutes', 'description', 'comment', 'billable', 'processed'];
    }

    /**
     * [saveModel - Save our worklog to the DB]
     * @param  boolean $werklog     [description]
     * @return [Eloquent model]     [The saved worklog model]
     */
    protected function saveModel($werklog = false)
    {

        if (Input::get('id'))
        {
            $werklog = Werklog::find(Input::get('id'));
        }
        if (!$werklog) $werklog = new Werklog();

        // load relations
        $load_curr_company  = $werklog->company;
        $load_curr_project  = $werklog->project;
        $load_curr_user     = $werklog->user;
        $load_curr_strippenkaart    = $werklog->strippenkaart;

        $werklog->date                  = Input::get('date');
        $werklog->company_id            = Input::get('company_id');
        $werklog->project_id            = Input::get('project_id');
        if(Input::get('strippenkaarten_id'))
        {
            $werklog->strippenkaarten_id    = Input::get('strippenkaarten_id');
        }
        $werklog->user_id               = Input::get('user_id');
        $werklog->minutes               = Input::get('minutes');
        $werklog->description           = Input::get('description');
        $werklog->comment               = Input::get('comment');
        $werklog->billable              = Input::get('billable');
        $werklog->processed             = Input::get('processed');
        $werklog->save();

        return $werklog;
    }

    /**
     * [getWorklogs - get all the worklogs]
     * @return [json] [description]
     */
    public function getWorklogs()
    {
        $all_worklogs = Werklog::all();
        return Response::json($all_worklogs);
    }

    /**
     * [getData - datatables response]
     * @return [json] [DT compatible object]
     */
    public function getData($model = null)
    {
        $Model = $this->modelName;

        $num_skip        = 0;
        $num_items       = 10;
        $recordsTotal    = 0;
        $recordsFiltered = 0;

        // check get vars
        if(isset($_GET['start']))
        {
            $num_skip = (int)$_GET['start'];
        }
        if(isset($_GET['length']))
        {
            $num_items = (int)$_GET['length'];
        }
        if(isset($_GET['search']))
        {
            $search_value = $_GET['search']['value'];
        }

        $all_werklogs = Werklog::orderBy('worklogs.id', 'DESC');
        if($model !== null)
        {
            $all_werklogs->where('worklogs.company_id', '=', (int)$model->id);
            if(!empty($search_value))
            {
                $all_werklogs->join('projects', 'worklogs.project_id', '=', 'projects.id')
                    ->whereRaw("(projects.name LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_werklogs->join('companies', 'worklogs.company_id', '=', 'companies.id')
                    ->join('projects', 'worklogs.project_id', '=', 'projects.id')
                    ->whereRaw("(projects.name LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal    = $all_werklogs->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_werklogs->skip($num_skip);
        }

        $all_werklogs = $all_werklogs->take($num_items)
                            ->get();

        $data = [];
        $i = 0;
        foreach($all_werklogs as $werklog)
        {
            // load relations
            $load_curr_company          = $werklog->company;
            $load_curr_project          = $werklog->project;
            $load_curr_user             = $werklog->user;
            $load_curr_strippenkaart    = $werklog->strippenkaart;
            $curr_worklog = $werklog;

            // Encoding example from the Zanussi App (remove weird strings and prepare the string for json encoding)
            // htmlspecialchars(htmlspecialchars_decode($post['post_title'], ENT_NOQUOTES),ENT_NOQUOTES | ENT_HTML5 | ENT_SUBSTITUTE)

            $curr_company   = $werklog->company !== NULL ? (object) ['id' => $werklog->company_id, 'bedrijfsnaam' => utf8_encode($werklog->company->bedrijfsnaam)] : (object) null;
            $curr_proj      = $werklog->project !== NULL ? (object) ['id' => $werklog->project_id, 'name' => utf8_encode($werklog->project->name)] : (object) null;
            $curr_strip     = $werklog->strippenkaart !== NULL ? (object) ['id' => $werklog->strippenkaarten_id, 'hours' => $werklog->strippenkaart->hours ] : (object) null;
            $curr_user      = $werklog->user !== NULL ? (object) ['id' => $werklog->user_id, 'username' => utf8_encode($werklog->user->username)] : (object) null;
            $data[]         = (object) ['DT_RowId' => 'row_'.$werklog->id, 'worklogs' => $curr_worklog, 'users' => $curr_user, 'companies' => $curr_company, 'projects' => $curr_proj, 'strippenkaarten' => $curr_strip];
        }

        $ret = [
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $data,
            'companies'       => $this->getAllCompanies(),
            'projects'        => $this->getAllProjects(),
            'users'           => $this->getAllUsers(),
            'strippenkaarten' => $this->getAllStrippenkaarten()
        ];

        return Response::json($ret);
    }

    /**
     * [postData - handle posted data]
     * @return [json] [DT compatible object]
     */
    public function postData()
    {
        $Model = $this->modelName;
        //error_log(json_encode($_POST));

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'worklogs' )
            ->fields(
                Field::inst( 'worklogs.id' ),
                // Date
                Field::inst( 'worklogs.date' ),
                // Company
                Field::inst( 'worklogs.company_id' ),
                Field::inst( 'companies.bedrijfsnaam' ),
                // Project
                Field::inst( 'worklogs.project_id' ),
                Field::inst( 'projects.name' ),
                // Project
                Field::inst( 'worklogs.strippenkaarten_id' ),
                // User
                Field::inst( 'worklogs.user_id' ),
                Field::inst( 'users.username' ),
                // Minutes
                Field::inst( 'worklogs.minutes' )->validator( 'Validate::notEmpty' ),
                // Description
                Field::inst( 'worklogs.description' ),
                // Comment
                Field::inst( 'worklogs.comment' ),
                // Billable
                Field::inst( 'worklogs.billable' )->validator('Validate::boolean'),
                // Processed
                Field::inst( 'worklogs.processed' )->validator('Validate::boolean')
            )
            ->leftJoin( 'users', 'users.id', '=',  'worklogs.user_id')
            ->leftJoin( 'companies', 'companies.id', '=',  'worklogs.company_id')
            ->leftJoin( 'projects', 'projects.id', '=',  'worklogs.project_id')
            ->leftJoin( 'strippenkaarten', 'strippenkaarten.id', '=', 'worklogs.strippenkaarten_id')
            ->process( $_POST )
            ->data();

        $data['companies']          = Company::all(['id AS value', 'bedrijfsnaam AS label']);
        $data['projects']           = Project::all(['id AS value', 'name AS label']);
        $data['users']              = User::all(['id AS value', 'username AS label']);
        $data['strippenkaarten']    = Strippenkaart::where('expiry_date', '=', null)
                                        ->get(['id AS value', 'hours AS label']);

        return Response::json($data);
    }

    /**
     * [postModelData - handle posted data associated with a specific company]
     * @param  [Eloquent model] $model  [company model]
     * @return [json]                   [DT compatible object]
     */
    public function postModelData($model)
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'worklogs' )
            ->fields(
                Field::inst( 'worklogs.id' ),
                // Date
                Field::inst( 'worklogs.date' ),
                // Company
                Field::inst( 'worklogs.company_id' ),
                // Project
                Field::inst( 'worklogs.project_id' ),
                Field::inst( 'projects.name' ),
                // strippenkaart
                //Field::inst( 'worklogs.strippenkaarten_id' ),
                // User
                Field::inst( 'worklogs.user_id' ),
                Field::inst( 'users.username' ),
                // Minutes
                Field::inst( 'worklogs.minutes' )->validator( 'Validate::notEmpty' ),
                // Description
                Field::inst( 'worklogs.description' ),
                // Comment
                Field::inst( 'worklogs.comment' ),
                // Billable
                Field::inst( 'worklogs.billable' )->validator('Validate::boolean'),
                // Processed
                Field::inst( 'worklogs.processed' )->validator('Validate::boolean')
            )
            ->leftJoin( 'users', 'users.id', '=',  'worklogs.user_id')
            ->leftJoin( 'projects', 'projects.id', '=',  'worklogs.project_id')
            ->leftJoin( 'strippenkaarten', 'strippenkaarten.id', '=', 'worklogs.strippenkaarten_id')
            ->process( $_POST )
            ->data();

        $data['projects']           = Project::all(['id as value', 'name as label']);
        $data['users']              = User::all(['id as value', 'username as label']);
        $data['strippenkaarten']    = Strippenkaart::where('expiry_date', '=', null)
                                        ->get(['id as value', 'hours as label']);

        return Response::json($data);
    }

    /**
     * [roadmapFetch - Fetches withstanding roadmap entries]
     * @return [json] [description]
     */
    public function roadmapFetch()
    {
        $status = IntegrationRoadmapController::processRoadmapWorklogs();

        return Response::json((object) null);
    }
}

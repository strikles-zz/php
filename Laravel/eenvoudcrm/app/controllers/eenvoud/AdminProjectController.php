<?php

use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Join,
    DataTables\Editor\Validate;


class AdminProjectController extends AdminCRUDController
{
	public function __construct()
    {

		$this->name       = 'projects';
		$this->modelName  = 'Project';
		$this->singleName = 'project';

		$this->validationRules = [
            'name' => 'required'
    	];

    	$this->validationMessages = [
            'name.required' => 'Name is a required field'
    	];

    	$this->dataTableColumns = ['id', 'company_id', 'name', 'description', 'comment', 'status', 'jira_id'];
	}

    /**
     * [saveModel]
     * @param  boolean $project     [description]
     * @return [Eloquent model]     [Project model]
     */
    protected function saveModel($project = false)
    {
        if (Input::get('id')) {
            $project = Project::find(Input::get('id'));
        }
        if (!$project) $project = new Project();

        $load_company_model     = $project->company;
        $project->company_id    = Input::get('company_id');
        $project->name          = Input::get('name');
        $project->description   = Input::get('description');
        $project->comment       = Input::get('comment');
        $project->status        = Input::get('status');
        $project->jira_id       = Input::get('jira_id');
        $project->save();

        return $project;
    }

    /**
     * [getProjects - helper function]
     * @return [json] [description]
     */
    public function getProjects()
    {
        $all_projects = Project::orderBy("name", "ASC")->get(["id", "company_id", "name"]);
        return Response::json($all_projects);
    }

    /**
     * [getData - get all projects data for DT]
     * @return [json] [DT compatible object]
     */
    public function getData($model = null)
    {
        $Model = $this->modelName;

        $num_skip = 0;
        $num_items = 10;
        $recordsTotal = 0;
        $recordsFiltered = 0;

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

        $all_projects = Project::orderBy('projects.id', 'DESC');
        if($model !== null)
        {
            $all_projects->where('projects.company_id', '=', (int)$model->id);
            if(!empty($search_value))
            {
                $all_projects->whereRaw("(projects.name LIKE '%".$search_value."%')");
            }
        }
        else
        {
            if(!empty($search_value))
            {
                $all_projects->join('companies', 'projects.company_id', '=', 'companies.id')
                    ->whereRaw("(projects.name LIKE '%".$search_value."%' OR companies.bedrijfsnaam LIKE '%".$search_value."%')");
            }
        }

        $recordsTotal = $all_projects->count();
        $recordsFiltered = $recordsTotal;

        if($num_skip > 0)
        {
            $all_projects->skip($num_skip);
        }

        $all_projects = $all_projects->take($num_items)
                            ->get();

        Debugbar::info(count($all_projects));

        $data = [];
        foreach($all_projects as $project)
        {
            // load relations
            $load_curr_company  = $project->company;

            $curr_company   = $project->company !== NULL ? (object) ['id' => $project->company_id, 'bedrijfsnaam' => utf8_encode($project->company->bedrijfsnaam)] : (object) null;
            $data[]         = (object) ['DT_RowId' => 'row_'.$project->id, 'projects' => $project, 'companies' => $curr_company];
        }

        $ret = [ 'data' => $data, 'recordsTotal' => $recordsTotal, 'recordsFiltered' => $recordsFiltered, 'companies' => $this->getAllCompanies() ];

        return Response::json($ret);
    }

    /**
     * [postData - handle posted data]
     * @return [json] [DT compatible object]
     */
    public function postData()
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'projects' )
            ->fields(
                Field::inst( 'projects.id' ),
                // Project
                Field::inst( 'projects.company_id' ),
                Field::inst( 'companies.bedrijfsnaam' ),
                // Price
                Field::inst( 'projects.name' ),
                // Description
                Field::inst( 'projects.description' ),
                // Start
                Field::inst( 'projects.comment' ),
                // End
                Field::inst( 'projects.status' ),
                // Jira
                Field::inst( 'projects.jira_id' )
            )
            ->leftJoin( 'companies', 'companies.id', '=',  'projects.company_id')
            ->process( $_POST )
            ->data();

        $data['companies'] = Company::all(['id AS value', 'bedrijfsnaam AS label']);

        return Response::json($data);
    }

    /**
     * [postModelData - handle posted data for a given company]
     * @param  [Eloquent model] $model  [company model]
     * @return [json]                   [DT compatible object]
     */
    public function postModelData($model)
    {
        $Model = $this->modelName;

        // Build our Editor instance and process the data coming from _POST
        global $db;
        $data = Editor::inst( $db, 'projects' )
            ->fields(
                Field::inst( 'projects.id' ),
                // Project
                Field::inst( 'projects.company_id' ),
                // Field::inst( 'companies.bedrijfsnaam' ),
                // Price
                Field::inst( 'projects.name' ),
                // Description
                Field::inst( 'projects.description' ),
                // Start
                Field::inst( 'projects.comment' ),
                // End
                Field::inst( 'projects.status' ),
                // Jira
                Field::inst( 'projects.jira_id' )
            )
            ->process( $_POST )
            ->data();

        //echo json_encode($ret);
        return Response::json($data);
    }

    /**
     * [index - This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)]
     * @return [json] [typeahead json]
     */
    public function index()
    {
        if (Input::get('q'))
        {
            $datums = Project::select('name AS value', 'id', 'company_id')
                ->where('name', 'like', '%' . Input::get('q') . '%')
                ->take(50)
                ->get();

            foreach ($datums as $datum)
            {
                $datum->tokens = explode(' ', $datum->value);
            }

            return Response::json($datums);
        }
        else
        {
            return Response::json(Project::select('name AS value','id', 'company_id')
                ->orderBy('updated_at', 'DESC')
                ->take(50)
                ->get());
        }
    }
}

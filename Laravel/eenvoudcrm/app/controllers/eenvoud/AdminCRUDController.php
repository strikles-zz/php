<?php


class AdminCRUDController extends BaseController
{

    use \GetAll;

    public  $modelName,                             // Laravel model
            $singleName,                            // Single name
            $name,                                  // Multiple name
            $validationRules,
            $validationMessages,
            $dataTableColumns = ['id', 'name'];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        // Title
        $title = ucfirst($this->name);
        // Show the page
        return View::make('admin/' . $this->name . '/index', compact('title'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        // Title
        $title      = 'Add New ' . ucfirst($this->singleName);
        $controller = $this->name;

        return View::make('admin/' . $this->name . '/create', compact('title', 'controller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $title      = 'Add New ' . ucfirst($this->singleName);
        $controller = $this->name;

        $input_validation = $this->validateModel();
        if ($input_validation !== true) {
            $this->populateForm();
            return View::make('admin/' . $this->name . '/create', compact('title', 'controller'))->withErrors($input_validation);
        };

        $model = $this->saveModel();
        $this->populateForm($model);

        return View::make('admin/' . $this->name . '/edit', compact('title', 'model', 'controller'));
    }


     /**
     * Display the specified resource.
     *
     * @param $model
     * @return Response
     */
    public function getShow($model)
    {
        // Title
        $title = $this->name;

        // Show the page
        return View::make('/admin/' . $this->name . '/show', compact('title', 'model'));
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param $model
     * @return Response
     */
    public function getEdit($model)
    {
        $title      = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $model->name;
        $controller = $this->name;
        $this->populateForm($model);
        $view       = 'admin/' . $this->name . '/edit';

        return View::make($view, compact('title', 'model', 'controller'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param $model
     * @return Response
     */
    public function postEdit($model)
    {
        $title            = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $model->name;
        $controller       = $this->name;
        $input_validation = $this->validateModel();

        if ($input_validation !== true)
        {
            $this->populateForm();
            return View::make('admin/' . $this->name . '/create', compact('title', 'controller'));
        };

        $this->saveModel($model);
        $this->populateForm($model);

        return View::make('admin/' . $this->name . '/edit', compact('title', 'model', 'controller'));
    }


    /**
     * Remove model page.
     *
     * @param $model
     * @return Response
     */
    public function getDelete($model)
    {
        $name  = property_exists($model, 'name') ? $model->name : '';
        $title = 'Delete ' . ucfirst($this->singleName) . ' - ' . $name;

        return View::make('admin/layouts/modals/delete', compact('model', 'title'))->with(['name' => $this->name]);
    }


    /**
     * Remove the specified model from storage.
     *
     * @param $model
     * @return Response
     */
    public function postDelete($model)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::All(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $model->id;
            $model->delete();

            // Was the blog post deleted?
            $Model = $this->modelName;
            $model = $Model::find($id);
            if(empty($model))
            {
                // Redirect to the blog posts management page
                return Response::json([
                    'success'   => 'success',
                    'reload'    => true
                ]);
            }
        }
        // There was a problem deleting the blog post
        return Response::json([
            'error'     => 'error',
            'reload'    => false
        ]);
    }

     /**
     * Show a list of all the users formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $Model  = $this->modelName;
        $models = $Model::select($this->dataTableColumns);

        return Datatables::of($models, true)
            ->make();
    }

    protected function validateModel($model = false)
    {
        $validation = Validator::make(Input::All(), $this->validationRules, $this->validationMessages);
        if($validation->fails())
        {
            return $validation;
        }

        return true;
    }

    public function populateForm($model = false)
    {
        if (!$model)
        {
            $input = Input::All();
        }
    }

    // Used anywhere ?
    public function getDetachChild($model, $child_relation, $child_inst)
    {
        $name    = property_exists($model, 'name') ? $model->name : $model->last_name;
        $contact = $model->$child_relation()->find($child_inst);
        $title   = 'Detach ' . $contact->first_name . ' ' . $contact->last_name . ' from ' . $model->name . '?';

        return View::make('admin/layouts/modals/detach', compact('model', 'title'))->with(['name' => $this->name]);
    }

    public function postDetachChild($model, $child_relation, $child_inst) {

        $model->$child_relation()->detach($child_inst);

         return Response::json([
            'success'   => 'success',
            'reload'    => true
        ]);

    }
}

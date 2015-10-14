<?php

use Former\Facades\Former;

class CRUDController extends BaseController {

    public  $modelName,                             // Laravel model    'Company'
            $singleName,                            // Single name          'company'
            $name,                                  // Multiple name        'companies'
            $validationRules,
            $validationMessages,
            $dataTableColumns = ['id', 'name'];
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {

        // Title
        $title = ucfirst($this->name);
        // Show the page
        return View::make('site/' . $this->name . '/index', compact('title'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {

        // Title
        $title = 'Add New ' . ucfirst($this->singleName);
        $controller = $this->name;

        return View::make('site/' . $this->name . '/create', compact('title', 'controller'));
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
        if ($input_validation !== true) {
            $this->populateForm();
            Former::withErrors($input_validation);
            return View::make('site/' . $this->name . '/create', compact('title', 'controller'))->with('error', 'Not saved!');
        };

        $model = $this->saveModel();
        $this->populateForm($model);

        return Redirect::to($this->name . '/' . $model->id . '/edit')->with('success', 'Saved!');
        //return View::make('site/' . $this->name . '/edit', compact('title', 'model', 'controller'));
    }


     /**
     * Display the specified resource.
     *
     * @param $company
     * @return Response
     */
    public function getShow($model) {
        // redirect to the frontend
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param $company
     * @return Response
     */
    public function getEdit($model) {

        $title = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $model->name;
        //error_log(json_encode($model));

        $controller = $this->name;
        $this->populateForm($model);
        $view = 'site/' . $this->name . '/edit';

        return View::make($view, compact('title', 'model', 'controller'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param $company
     * @return Response
     */
    public function postEdit($model) {

        $title = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $model->name;
        $controller = $this->name;

        $input_validation = $this->validateModel();
        if ($input_validation !== true) {
            $this->populateForm();
            Former::withErrors($input_validation);
            return View::make('site/' . $this->name . '/edit', compact('title', 'model', 'controller'))->with('error', 'Not saved!');
        };

        $this->saveModel($model);
        $this->populateForm($model);



        return View::make('site/' . $this->name . '/edit', compact('title', 'model', 'controller'))->with('success', 'Saved!');

    }


    /**
     * Remove company page.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($model) {

        $name = property_exists($model, 'name') ? $model->name : $model->last_name;
        $title = 'Delete ' . ucfirst($this->singleName) . ' - ' . $name;

        return View::make('site/layouts/modals/delete', compact('model', 'title'))->with(['name' => $this->name]);
    }


    /**
     * Remove the specified company from storage.
     *
     * @param $company
     * @return Response
     */
    public function postDelete($model) {

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
            'error' => 'error',
            'reload'    => false
        ]);
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
            ->add_column('actions', implode('&nbsp;', $actions))
            ->remove_column('id')
            ->make();
    }


    protected function validateModel($model = false) {

        $validation = Validator::make(Input::All(), $this->validationRules, $this->validationMessages);

        if($validation->fails()) {
            return $validation;
        }

        return true;
    }

    public function getDetachChild($model, $child_relation, $child_inst) {

        $name = property_exists($model, 'name') ? $model->name : $model->last_name;
        $contact = $model->$child_relation()->find($child_inst);
        $title = 'Detach ' . $contact->first_name . ' ' . $contact->last_name . ' from ' . $model->name . '?';

        return View::make('site/layouts/modals/detach', compact('model', 'title'))->with(['name' => $this->name]);

    }

    public function postDetachChild($model, $child_relation, $child_inst) {

        $model->$child_relation()->detach($child_inst);

         return Response::json([
            'success'   => 'success',
            'reload'    => true
        ]);

    }

    public function postAttachChild($model, $child_relation, $child_inst) {

        if ($model->$child_relation()->find($child_inst)) {
             return Response::json([
                'error' => 'Already attached',
                'reload'    => false
            ]);
        }

        $model->$child_relation()->attach($child_inst);

         return Response::json([
            'success'   => 'success',
            'reload'    => true,
            'model'     => json_encode($model),
            'child'     => json_encode($child_inst),
            'relation'  => json_encode($child_relation)
        ]);

    }

    public function getIframe() {
         return View::make('site/layouts/iframe')->withTitle('iframe');
    }

    /* GET DETAILS FOR SEARCH PAGES */
    public function getDetails($model) {

        $view = View::make('site/' . $this->name . '/details');
        $view = $view->with([$this->singleName => $model]);

        return $view;
    }
}

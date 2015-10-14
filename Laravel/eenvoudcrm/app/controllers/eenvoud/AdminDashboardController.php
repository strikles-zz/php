<?php

/**
 * Admin dashboard
 *
 */
class AdminDashboardController extends AdminWerklogController
{
    public function __construct()
    {
        $this->name         = 'werklogs';
        $this->modelName    = 'Werklog';
        $this->singleName   = 'werklog';

        $this->validationRules = [
            'project_id' => 'required',
            'minutes'    => 'required'
        ];

        $this->validationMessages = [
            'project_id.required' => 'Project is a required field',
            'minutes.required'    => 'Minutes is a required field'
        ];

        $this->dataTableColumns = ['id', 'date', 'company_id', 'project_id', 'strippenkaarten_id', 'user_id', 'minutes', 'description', 'comment', 'billable', 'processed'];
    }

    /**
     * [getIndex - Render main index view]
     * @return [view] [index]
     */
	public function getIndex()
	{
		$title = 'Werklog';

        return View::make('admin/dashboard', compact('title'));
	}

    /**
     * [postCreate - Render Edit view post-create]
     * @return [type] [description]
     */
    public function postCreate()
    {
        $title = 'Add New Werklog';

        $input_validation = $this->validateModel();
        if ($input_validation !== true)
        {
            $this->populateForm();
            return View::make('/admin/dashboard', compact('title'))->withErrors($input_validation);
        };

        $model = $this->saveModel();
        return Redirect::to('/admin');
    }
}

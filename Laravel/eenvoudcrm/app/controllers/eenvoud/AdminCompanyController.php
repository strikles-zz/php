<?php

class AdminCompanyController extends AdminCRUDController
{
    use \GetReporting;

    public function __construct()
    {
        $this->name       = 'companies';
        $this->modelName  = 'Company';
        $this->singleName = 'company';

        $this->validationRules = [
        ];

        $this->validationMessages = [
        ];

        $this->dataTableColumns = ['id', 'bedrijfsnaam'];
    }

    /**
     * [getShow - Render main index view]
     * @param  [Eloquent model] $model [The respective company eloquent model]
     * @return [view]           [company index view]
     */
    public function getShow($model)
    {
		// Title
        $title = $model->bedrijfsnaam;

        $subscriptions_by_cat = $this->companySubscriptionsReporting($model->id);
        $worklogs_by_proj     = $this->companyWorklogsReporting($model->id);

        // Show the page
        return View::make('admin/' . $this->name . '/show', compact('title', 'subscriptions_by_cat', 'worklogs_by_proj'))->withCompany($model)->withModel($model);
    }

    /**
     * [index - This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)]
     * @return [json] [DT compatible object]
     */
    public function index()
    {
        if (Input::get('q'))
        {
            $datums = Company::select('bedrijfsnaam AS value', 'id')
                ->where('bedrijfsnaam', 'like', '%' . Input::get('q') . '%')
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

            return Response::json(Company::select('bedrijfsnaam AS value', 'id')
                ->orderBy('updated_at', 'DESC')
                ->take(50)
                ->get());
        }
    }
}

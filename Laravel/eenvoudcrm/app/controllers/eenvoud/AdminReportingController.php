<?php

class AdminReportingController extends AdminCRUDController
{
	use \GetReporting;
    public function __construct()
    {
        $this->name         = 'reporting';

        $this->validationRules = [
        ];

        $this->validationMessages = [
        ];
    }

	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
    public function getIndex()
    {
        // Title
        $title = ucfirst($this->name);

        $subscriptions_by_cat = $this->subscriptionsReporting();
        $worklogs_by_proj     = $this->worklogsReporting();

        // Show the page
        return View::make('admin/' . $this->name . '/index', compact('title', 'subscriptions_by_cat', 'worklogs_by_proj'));
    }

}

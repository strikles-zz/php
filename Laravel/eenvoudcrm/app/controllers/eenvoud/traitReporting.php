<?php

trait GetReporting
{
    protected static $_numrows = 10;

    public function allServiceCats()
    {
        $all_cats = ServiceCategory::all();

        return $all_cats;
    }

    public function getCompanyProjects($company_id)
    {
        $company_projects = Project::where('company_id', '=', $company_id)->get();

        return $company_projects;
    }

    public function getAllProjects()
    {
        $projects = Project::all();

        return $projects;
    }

    public function companySubscriptionsReporting($company_id)
    {
        // category umbrella + 12 months umbrella
        //
        // by service id
        //
        // by price
        //
        // SELECT *, COUNT(desiredcolumn) AS occurances FROM table GROUP BY desiredcolumn ORDER BY occurances DESC LIMIT 1;

        $subscriptions_segmented_by_cat = [];
        $service_cats = $this->allServiceCats();

        foreach ($service_cats as $ndx => $service_cat)
        {
            // for each service category
            $subscriptions_by_service = Subscription::with('service')
                                ->selectRaw('service_id, COUNT(service_id) as service_occurrences, SUM(total_price) as service_group_total_price')
                                ->where('company_id', '=', $company_id)
                                ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
                                ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'))
                                ->whereHas('service',function($query) use($service_cat) {
                                    $query->where('category_id', $service_cat->id);
                                })
                                ->groupBy('service_id')
                                ->orderBy('service_occurrences', 'DESC')
                                ->take(static::$_numrows)
                                ->get();

            $subscriptions_segmented_by_cat[$service_cat->id] = $subscriptions_by_service;
        }

        Debugbar::info($subscriptions_segmented_by_cat);

        return $subscriptions_segmented_by_cat;
    }

    public function subscriptionsReporting()
    {
        // category umbrella + 12 months umbrella
    	//
    	// by service id
        //
        // by price

        $subscriptions_segmented_by_cat = [];
        $service_cats = $this->allServiceCats();

        foreach ($service_cats as $ndx => $service_cat)
        {
        	// for each service category
        	$subscriptions_by_service = Subscription::with('service')
        						->selectRaw('service_id, COUNT(service_id) as service_occurrences, SUM(total_price) as service_group_total_price')
                                ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_terminated.id'))
                                ->where('status_id', '!=', Config::get('eenvoudcrm.subscriptions_status_ended.id'))
                                ->whereHas('service',function($query) use($service_cat) {
                                    $query->where('category_id', $service_cat->id);
                                })
    							->groupBy('service_id')
    							->orderBy('service_occurrences', 'DESC')
    							->take(static::$_numrows)
    							->get();

            $subscriptions_segmented_by_cat[$service_cat->id] = $subscriptions_by_service;
        }

		Debugbar::info($subscriptions_segmented_by_cat);

		return $subscriptions_segmented_by_cat;
    }

    public function companyWorklogsReporting($company_id)
    {
        // project umbrella + 12 months umbrella
        //
        // by developer
        //
        // by hours

        $worklogs_segmented_by_proj = [];
        $company_projects = $this->getCompanyProjects($company_id);

        error_log(">>> ".count($company_projects).json_encode($company_projects));

        foreach ($company_projects as $ndx => $company_project)
        {
            $worklogs_by_user = Werklog::with('user')
                                ->selectRaw('user_id, COUNT(user_id) as user_occurrences, SUM(minutes) as user_project_total_time')
                                ->where('project_id', $company_project->id)
                                ->groupBy('user_id')
                                ->orderBy('user_project_total_time', 'DESC')
                                ->take(static::$_numrows)
                                ->get();

            $worklogs_segmented_by_proj[$company_project->id] = $worklogs_by_user;
        }

        Debugbar::info($worklogs_segmented_by_proj);

        return $worklogs_segmented_by_proj;
    }

    public function worklogsReporting()
    {
    	// project umbrella + 12 months umbrella
    	//
    	// by developer
        //
        // by hours

        $worklogs_segmented_by_proj = [];
        $company_projects = $this->getAllProjects();

        foreach ($company_projects as $ndx => $company_project)
        {
            $worklogs_by_user = Werklog::with('user')
                                ->selectRaw('user_id, COUNT(user_id) as user_occurrences, SUM(minutes) as user_project_total_time')
                                ->where('project_id', $company_project->id)
                                ->groupBy('user_id')
                                ->orderBy('user_project_total_time', 'DESC')
                                ->take(static::$_numrows)
                                ->get();

            $worklogs_segmented_by_proj[$company_project->id] = $worklogs_by_user;
        }

		Debugbar::info($worklogs_segmented_by_proj);

		return $worklogs_segmented_by_proj;
    }
}

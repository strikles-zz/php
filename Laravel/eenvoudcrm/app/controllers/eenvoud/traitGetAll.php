<?php

trait GetAll
{

	public function getAllUsers()
    {
        $all_users  = User::all(['id', 'username']);
        $users      = [];
        foreach($all_users as $user)
        {
            $users[] = (object) ['value' => $user->id, 'label' => utf8_encode($user->username)];
        }

        return $users;
    }

    public function getAllCompanies()
    {
        $all_companies  = Company::orderBy('bedrijfsnaam', 'ASC')->get(['id', 'bedrijfsnaam']);
        $companies      = [];
        foreach($all_companies as $company)
        {
            $companies[] = (object) ['value' => $company->id, 'label' => utf8_encode($company->bedrijfsnaam)];
        }

        return $companies;
    }

    public function getAllProjects()
    {
        $all_projects  = Project::orderBy('name', 'ASC')->get(['id', 'name', 'company_id']);
        $projects      = [];
        foreach($all_projects as $project)
        {
            $projects[] = (object) ['value' => $project->id, 'label' => utf8_encode($project->company_id . '|' . $project->name)];
        }

        return $projects;
    }

    public function getAllStrippenkaarten()
    {
        $all_strippenkaarten  = Strippenkaart::all(['id', 'hours']);
        $strippenkaarten      = [];
        foreach($all_strippenkaarten as $strippenkaart)
        {
            $strippenkaarten[] = (object) ['value' => $strippenkaart->id, 'label' => $strippenkaart->hours];
        }

        return $strippenkaarten;
    }

    public function getAllServices()
    {
        // services
        $all_services  = Service::orderBy('name', 'ASC')->get(['id', 'name']);
        $services      = [];
        foreach($all_services as $service)
        {
            $services[] = (object) ['value' => $service->id, 'label' => utf8_encode($service->name)];
        }

        return $services;
    }

    public function getAllServiceCategories()
    {
        // service cats
        $all_service_categories  = ServiceCategory::orderBy('name', 'ASC')->get(['id', 'name']);
        $service_categories      = [];
        foreach($all_service_categories as $category)
        {
            $service_categories[] = (object) ['value' => $category->id, 'label' => utf8_encode($category->name)];
        }

        return $service_categories;
    }

    public function getAllStatuses()
    {
        // status
        $all_status  = Status::orderBy('id', 'ASC')->get(['id', 'description']);
        $statuses    = [];
        foreach($all_status as $status)
        {
            $statuses[] = (object) ['value' => $status->id, 'label' => utf8_encode($status->description)];
        }

        return $statuses;
    }

    public function getAllInvoicePeriods()
    {
        // status
        $all_periods  = Period::orderBy('id', 'ASC')->get(['id', 'description']);
        $periods    = [];
        foreach($all_periods as $period)
        {
            $periods[] = (object) ['value' => $period->id, 'label' => utf8_encode($period->description)];
        }

        return $periods;
    }

}

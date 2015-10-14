<?php namespace App\Http\Controllers;

class SearchController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSearch()
    {
        $users = [];
        $groups = [];
        $bodyclass = "app-main";

        $bodyclass = "app-search";
        return view('site.search.index', compact('bodyclass', 'users', 'groups'));
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function postSearch()
    {
        $query_term = \Request::input('search-term');
        error_log('Search '.json_encode($query_term));

        //filter types
        $users = \App\User::where('last_name', 'LIKE', "%$query_term%")->get();
        $groups = \App\Group::where('name', 'LIKE', "%$query_term%")->get();

        error_log('>>> Le search users'.json_encode($groups));

        $bodyclass = "app-search";
        return view('site.search.index', compact('bodyclass', 'users', 'groups'));
    }
}

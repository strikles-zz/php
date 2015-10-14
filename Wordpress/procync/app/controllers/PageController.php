<?php


class PageController extends BaseController
{

	 // constructor
    public function __construct()
    {
        // add styles
        Asset::add('vendor-style', 'css/vendor.min.css', array(), '1.0', 'screen');
        Asset::add('eenvoud-style', 'css/style.min.css', array(), '1.0', 'screen');

        // add scripts in footer
        Asset::add('vendor-scripts', 'js/vendor.min.js', ['jquery'], '1.0', true);
        Asset::add('eenvoud-scripts', 'js/scripts.min.js', ['jquery'], '1.0', true);
    }

    public function index()
    {
    	return View::make('welcome');
    }
}
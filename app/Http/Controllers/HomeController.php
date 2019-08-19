<?php

namespace newhopecrm\Http\Controllers;

use Illuminate\Http\Request;
use newhopecrm\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app');
    }
}

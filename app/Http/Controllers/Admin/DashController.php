<?php

namespace newhopecrm\Http\Controllers\Admin;

use Illuminate\Http\Request;
use newhopecrm\Http\Controllers\Controller;


class DashController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //return view('app')->withUser(Auth::user());
        return view('app');
    }
}

<?php

namespace newhopecrm\Http\Controllers;

use newhopecrm\Http\Requests;
use newhopecrm\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('app')->withUser(Auth::user());
    }
}

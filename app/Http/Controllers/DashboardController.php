<?php

namespace newhopecrm\Http\Controllers;

use newhopecrm\Http\Requests;
use newhopecrm\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use OpenGraph;
// use TwitterSEO;
// use SEOMeta;
// use Mapper;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$configuration = Configuration::find(1);
        //$metaKeywords = explode(',', (string)$configuration->global_meta_keyword);

        //SEOMeta::addKeyword($metaKeywords);
        //SEOMeta::setTitle(' New Hope In Christ');
        //SEOMeta::setDescription($configuration->global_meta_description);
        //SEOMeta::setCanonical($configuration->global_canonical);

        //OpenGraph::addProperty('locale', 'en_GB');
        //OpenGraph::setDescription($configuration->global_meta_description);
        //OpenGraph::setTitle($configuration->global_meta_title);
        //OpenGraph::addImage($configuration->company_logo_image);
        //OpenGraph::setUrl($configuration->global_canonical);

        // TwitterSEO::setTitle($configuration->global_meta_title);
        // TwitterSEO::setSite($configuration->global_twitter_user);
        // TwitterSEO::addImage($configuration->company_logo_image);

        // $slides = Slide::all();
        // $services = Service::all();
        // $works = Work::all();
        // $partners = Partner::all();
        // $socials = Social::all();
        // $prefers = Prefer::all();
        // $values = Value::all();
        // $skills = Skill::all();
        $user = Auth::user();

        //return view('dashboard')->withUser($user)->withConfiguration($configuration);
        return view('dashboard')->withUser($user);
    }
}

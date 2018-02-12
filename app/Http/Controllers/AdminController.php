<?php

namespace App\Http\Controllers;

use App\Job;
use App\City;
use App\jobs;
use App\Skill;
use App\Company;
use App\Country;
use App\Category;
use App\UnlistedJob;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        $skills = Skill::latest()->get();
        $countries = Country::orderBy('name')->get();
        $cities = City::all();
        $companies = Company::orderBy('name')->get();
        $categories = Category::orderBy('title')->get();
        $unlistedJobs = UnlistedJob::latest()->get();
        $jobs = Job::latest()->get();

        return view('admin.index', [
            'skills' => $skills,
            'countries' => $countries,
            'companies' => $companies,
            'categories' => $categories,
            'unlistedJobs' => $unlistedJobs,
            'jobs' => $jobs,
            'cities' => $cities
        ]);
    }

}

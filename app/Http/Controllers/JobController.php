<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index() 
    {

        $jobs = Job::latest();

        if ($companySlug = request('company')) {
            $company = Company::where('slug', $companySlug)->firstOrFail();

            $jobs->where('company_id', $company->id);
        }

        $jobs = $jobs->paginate(25);

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }

}

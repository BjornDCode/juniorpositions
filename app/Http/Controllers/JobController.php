<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Http\Request;
use App\Filters\SearchFilters;

class JobController extends Controller
{
    
    public function index(SearchFilters $filters) 
    {
        $jobs = $this->getJobs($filters);

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }

    public function getJobs($filters) 
    {
        $jobs = Job::latest()->filter($filters);

        return $jobs->paginate(25);
    }

}

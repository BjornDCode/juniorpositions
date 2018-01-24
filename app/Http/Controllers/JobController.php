<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index() 
    {
        $jobs = Job::latest()->paginate(25);

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }

}

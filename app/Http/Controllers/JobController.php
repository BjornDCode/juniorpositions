<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index() 
    {
        $jobs = Job::latest()
                ->with(['company', 'skills'])
                ->get()
                ->groupBy(function ($job) {
                    return $job->created_at->format('F');
                });

        return view('jobs.index', compact('jobs'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index() 
    {
        $jobs = Job::with(['company', 'skills'])->get();

        return view('jobs.index', compact('jobs'));
    }

}

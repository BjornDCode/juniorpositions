<?php

namespace App\Http\Controllers;

use App\Job;
use App\Category;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index(Category $category) 
    {
        if ($category->exists) {
            $jobs = $category->jobs()->latest()->paginate(25);
        } else {
            $jobs = Job::latest()->paginate(25);
        }

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }

}

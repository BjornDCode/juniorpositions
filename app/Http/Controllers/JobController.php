<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use App\UnlistedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth')->only('store');
    }
    
    public function index() 
    {
        $jobs = Job::latest()->paginate(25);

        return view('jobs.search', compact('jobs'));
    }

    public function show(Job $job) 
    {
        return view('jobs.show', compact('job'));
    }

    public function store(Request $request) 
    {


        $job = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'apply_url' => 'required|unique:jobs',
            'company_id' => 'required|exists:companies,id',
            'role_id' => 'required|exists:roles,id',
            'city_id' => 'required|exists:cities,id'
        ]);

        $job = Job::create($job);


        $skills = $request->validate([
            'skills' => 'required',
            'skills.*' => 'required|exists:skills,id'
        ]);

        foreach ($skills['skills'] as $skill) {
            DB::table('job_skill')->insert([
                'job_id' => $job->id,
                'skill_id' => $skill
            ]);
        }

    
        $unlistedJob = $request->validate([
            'unlistedJob' => 'required|exists:unlisted_jobs,id'
        ]);

        UnlistedJob::find($unlistedJob['unlistedJob'])->delete();



        return back();
    }

}

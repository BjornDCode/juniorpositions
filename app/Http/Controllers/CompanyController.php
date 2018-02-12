<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function show(Company $company) 
    {
        $jobs = $company->jobs()->latest()->paginate(25);

        return view('jobs.index', [
            'jobs' => $jobs,
            'headline' => "Jobs at {$company->name}"
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required|unique:companies',
            'slug' => 'required|unique:companies',
        ]);

        $city = Company::create($data);

        return back();
    }

}

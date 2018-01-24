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
            'company' => $company
        ]);
    }

}

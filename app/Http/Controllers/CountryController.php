<?php

namespace App\Http\Controllers;

use App\Job;
use App\City;
use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    
    public function show(Country $country) 
    {
        
        $jobs = $country->jobs()->latest()->paginate(25);
        
        return view('jobs.index', [
            'jobs' => $jobs,
            'headline' => "Jobs in {$country->name}"
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required|unique:countries',
            'slug' => 'required|unique:countries'
        ]);

        $country = Country::create($data);

        return back();
    }

}

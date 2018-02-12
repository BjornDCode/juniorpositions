<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function show(Country $country, City $city) 
    {
        $jobs = $city->jobs()->latest()->paginate(25);

        return view('jobs.index', [
            'jobs' => $jobs,
            'headline' => "Jobs in {$city->name}"
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required|unique:countries',
            'slug' => 'required|unique:countries',
            'country_id' => 'required|exists:countries,id'
        ]);

        $city = City::create($data);

        return back();
    }

}

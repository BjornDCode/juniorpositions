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
            'city' => $city
        ]);
    }

}

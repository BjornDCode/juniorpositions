<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Company;
use App\Country;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        $skills = Skill::latest()->get();
        $countries = Country::orderBy('name')->get();
        $companies = Company::orderBy('name')->get();

        return view('admin.index', [
            'skills' => $skills,
            'countries' => $countries,
            'companies' => $companies
        ]);
    }

}

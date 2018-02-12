<?php

namespace App\Http\Controllers;

use App\Skill;
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

        return view('admin.index', [
            'skills' => $skills,
            'countries' => $countries
        ]);
    }

}

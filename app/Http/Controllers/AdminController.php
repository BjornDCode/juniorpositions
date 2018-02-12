<?php

namespace App\Http\Controllers;

use App\Skill;
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

        return view('admin.index', [
            'skills' => $skills
        ]);
    }

}

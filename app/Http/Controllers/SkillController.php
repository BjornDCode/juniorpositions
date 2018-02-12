<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    
    public function show(Skill $skill) 
    {
        $jobs = $skill->jobs()->latest()->paginate(25);

        return view('jobs.index', [
            'jobs' => $jobs,
            'headline' => "Jobs that required {$skill->name}"
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required|unique:skills',
            'slug' => 'required|unique:skills'
        ]);

        $skill = Skill::create($data);

        return back();
    }

}

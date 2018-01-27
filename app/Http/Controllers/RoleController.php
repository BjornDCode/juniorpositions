<?php

namespace App\Http\Controllers;

use App\Role;
use App\Category;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function show(Category $category, Role $role) 
    {
        $jobs = $role->jobs()->latest()->paginate(25);

        return view('jobs.index', [
            'jobs' => $jobs,
            'headline' => "Jobs in {$category->title}"
        ]);
    }

}

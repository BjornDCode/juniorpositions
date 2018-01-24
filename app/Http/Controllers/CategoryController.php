<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function show(Category $category) 
    {
        $jobs = $category->jobs()->latest()->paginate(25);

        return view('jobs.index', [
            'jobs' => $jobs,
            'category' => $category
        ]);
    }

}

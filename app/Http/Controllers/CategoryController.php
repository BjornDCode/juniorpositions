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
            'headline' => "Jobs in {$category->title}"
        ]);
    }

    public function store(Request $request) 
    {
        $data = $request->validate([
            'title' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

        $category = Category::create($data);

        return back();
    }

}

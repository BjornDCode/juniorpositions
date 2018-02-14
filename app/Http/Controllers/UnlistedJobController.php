<?php

namespace App\Http\Controllers;

use App\UnlistedJob;
use Illuminate\Http\Request;

class UnlistedJobController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function destroy($id) 
    {
        $job = UnlistedJob::find($id);
        $job->delete();

        return back();   
    }

}

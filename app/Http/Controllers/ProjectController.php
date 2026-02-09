<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projects;

class ProjectController extends Controller
{
    

    public function index($view = 'portofolio.portofolio')
    {
    $projects = Projects::all();
    $message = null;

    if ($projects->isEmpty()) {
        $message = 'Data projects masih kosong';
    }

    return view($view, compact('projects', 'message'));
    }


    public function project()
    {
    $project = "Project Section";
    $projects = Projects::all(); 
    // $projects = collect([]);
    $message = $projects->isEmpty() ? 'Data projects masih kosong' : null;

    return view('project', compact('project', 'projects', 'message'));
    }
}

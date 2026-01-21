<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = "Ini adalah daftar project fattah";

        return view('project', compact('project'));
    }
}

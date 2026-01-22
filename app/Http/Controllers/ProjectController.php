<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function portofolio()
    {
        $projects = [
            [
                'title' => 'Website Portofolio',
                'description' => 'Portofolio sederhana menggunakan HTML dan CSS',
                'link' => '#',
            ],
            [
                'title' => 'Website CRUD Parkir',
                'description' => 'Website backend menggunakan HTML, CSS, PHP, dan Database',
            ],
            [
                'title' => 'Website Landing Page',
                'description' => 'Website Landing page yang responsive serta tampilan terlihat modern',
            ],
        ];

        return view('portofolio.portofolio', compact('projects'));
    }

    public function project()
    {
        $project = "Ini adalah daftar project Fattah";

        return view('project', compact('project'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // ===============================
    // LANDING PAGE
    // ===============================
    public function index($view = 'portofolio.portofolio')
{
    $skills = Skill::all();
    $projects = Projects::all();
    $services = \App\Models\Service::all(); // Fetch services
    $message = $projects->isEmpty() ? 'Data projects masih kosong' : null;

    return view($view, compact('projects', 'skills', 'services', 'message'));
}


    // ===============================
    // HALAMAN PROJECT
    // ===============================
    public function project()
    {
        $project = "Project Section";
        $projects = Projects::all();
        $message = $projects->isEmpty() ? 'Data projects masih kosong' : null;

        return view('project', compact('project', 'projects', 'message'));
    }

    // ===============================
    // DASHBOARD
    // ===============================
    public function dashboard()
    {
        $projects = Projects::latest()->get();
        $message = $projects->isEmpty() ? 'Belum ada project' : null;

        return view('dashboard', compact('projects', 'message'));
    }

    // ===============================
    // HALAMAN FORM TAMBAH PROJECT
    // ===============================
    public function create()
    {
        return view('create-project'); // kita bikin file create-project.blade.php
    }

    // ===============================
    // STORE (TAMBAH PROJECT)
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Project berhasil ditambahkan');
    }

    // ===============================
    // EDIT (AMBIL DATA)
    // ===============================
    public function edit($id)
    {
        $project = Projects::findOrFail($id);

        return view('edit-project', compact('project'));
    }

    // ===============================
    // UPDATE (SIMPAN PERUBAHAN)
    // ===============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = Projects::findOrFail($id);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Project berhasil diupdate');
    }

    // ===============================
    // DELETE
    // ===============================
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);

        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Project berhasil dihapus');
    }
}

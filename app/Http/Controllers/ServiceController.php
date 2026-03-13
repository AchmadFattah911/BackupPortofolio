<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('dashboard-services', compact('services'));
    }

    public function create()
    {
        return view('create-service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Layanan berhasil dibuat!');
    }

    public function edit(Service $service)
    {
        return view('edit-service', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Layanan berhasil di-purge!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Tampilkan list semua skills
     */
    public function index()
    {
        $skills = Skill::all();
        // Mengarah ke dashboard utama lo
        return view('dashboard-skills', compact('skills'));
    }

    /**
     * Form tambah skill
     */
    public function create()
    {
        // Pastikan nama filenya create-skills.blade.php
        return view('create-skills'); 
    }

    /**
     * Simpan skill baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        Skill::create($request->only(['name', 'level']));

        return redirect()->route('skills.index')->with('success', 'Mantap! Skill baru berhasil ditambah.');
    }

    /**
     * Form edit skill
     */
    public function edit(Skill $skill)
    {
        // Fungsi ini yang nyiapin data ke file edit-skills lo
        return view('edit-skills', compact('skill'));
    }

    /**
     * Update skill
     */
    public function update(Request $request, Skill $skill)
    {
        // Validasi input biar gak ngaco datanya
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
        ]);

        // Update data di database
        $skill->update($request->only(['name', 'level']));

        // Redirect balik ke list dengan pesan sukses
        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui!');
    }

    /**
     * Hapus skill
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill dihapus dari daftar.');
    }
}
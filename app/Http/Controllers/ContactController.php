<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'deskripsi' => 'required|min:5',
        ]);

        return back()->with('success', 'Pesan berhasil dikirim 🙌');
    }
}

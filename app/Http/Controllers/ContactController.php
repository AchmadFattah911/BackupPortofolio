<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'deskripsi' => 'required|min:5',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Pesan berhasil dikirim 🙌');
    }

    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard-contacts', compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

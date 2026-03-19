<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil user dari database
        $user = User::where('email', $request->email)->first();

        // Cek user & password
        if ($user && Hash::check($request->password, $user->password)) {

            // Simpan session
            $request->session()->put('logged_in', true);
            $request->session()->put('email', $user->email);
            $request->session()->put('is_admin', $user->is_admin);

            return redirect('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['login' => 'Email atau password salah!'])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('success', 'Logout berhasil!');
    }
}
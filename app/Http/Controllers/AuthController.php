<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // Email & password statis
        if ($request->email === 'admin@example.com' && $request->password === '12345') {
            $request->session()->put('logged_in', true);
            $request->session()->put('email', 'admin@example.com');

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

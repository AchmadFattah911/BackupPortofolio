<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

// LANDING PAGE (PORTOFOLIO)
Route::get('/', [ProjectController::class, 'index']);

// HALAMAN PROJECT
Route::get('/project', [ProjectController::class, 'project']);

// KELUHAN USER PADA WEBSITE
Route::post('/portofolio/send', [ContactController::class, 'send'])->name('portofolio.send');


// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Dashboard (hanya bisa diakses kalau sudah login)
//Route::get('/dashboard', function () {
    //if (!session('logged_in')) {
        //return redirect('/login')->withErrors(['login' => 'Silakan login terlebih dahulu']);
    //}
    //return view('dashboard');
//})->name('dashboard');

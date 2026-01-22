<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// LANDING PAGE (PORTOFOLIO)
Route::get('/', [ProjectController::class, 'portofolio']);

// HALAMAN PROJECT
Route::get('/project', [ProjectController::class, 'index']);

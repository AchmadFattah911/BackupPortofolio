<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('portofolio.portofolio'); // sesuai nama file
});

// Gunakan controller untuk project
Route::get('/project', [ProjectController::class, 'index']);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SkillController;

// ===============================
// LANDING PAGE (PORTOFOLIO)
// ===============================
Route::get('/', [ProjectController::class, 'index'])->name('home'); // <-- Hanya satu

// ===============================
// HALAMAN PROJECT
// ===============================
Route::get('/project', [ProjectController::class, 'project']);

// ===============================
// KELUHAN USER
// ===============================
Route::post('/portofolio/send', [ContactController::class, 'send'])
    ->name('portofolio.send');

// ===============================
// DASHBOARD + CRUD PROJECT
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [ProjectController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/projects', [ProjectController::class, 'store'])
        ->name('projects.store');

    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])
        ->name('projects.edit');

    Route::put('/projects/{id}', [ProjectController::class, 'update'])
        ->name('projects.update');

    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])
        ->name('projects.destroy');

    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->name('projects.create');
});

// ===============================
// DASHBOARD + CRUD SKILLS
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard/skills', [SkillController::class, 'index'])
        ->name('skills.index');

    Route::get('/dashboard/skills/create', [SkillController::class, 'create'])
        ->name('skills.create');

    Route::post('/dashboard/skills', [SkillController::class, 'store'])
        ->name('skills.store');

    Route::get('/dashboard/skills/{skill}/edit', [SkillController::class, 'edit'])
        ->name('skills.edit');

    Route::put('/dashboard/skills/{skill}', [SkillController::class, 'update'])
        ->name('skills.update');

    Route::delete('/dashboard/skills/{skill}', [SkillController::class, 'destroy'])
        ->name('skills.destroy');
});

// ===============================
// DASHBOARD + CRUD CONTACTS (INBOX)
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/contacts', [ContactController::class, 'index'])
        ->name('contacts.index');

    Route::delete('/dashboard/contacts/{contact}', [ContactController::class, 'destroy'])
        ->name('contacts.destroy');
});

// ===============================
// DASHBOARD + CRUD SERVICES
// ===============================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
    Route::get('/dashboard/services/create', [\App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
    Route::post('/dashboard/services', [\App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
    Route::get('/dashboard/services/{service}/edit', [\App\Http\Controllers\ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/dashboard/services/{service}', [\App\Http\Controllers\ServiceController::class, 'update'])->name('services.update');
    Route::delete('/dashboard/services/{service}', [\App\Http\Controllers\ServiceController::class, 'destroy'])->name('services.destroy');
});

// ===============================
// PROFILE
// ===============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for Admin and Employee only
Route::middleware(['auth', 'role:admin,employee'])->group(function () {
    // Projects routes
    Route::get('/projects', [ProjectController::class, 'view'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

    // Officials routes
    Route::get('/officials', [OfficialController::class, 'view'])->name('officials.index');

    // Residents routes
    Route::get('/residents', [ResidentController::class, 'view'])->name('residents.index');

    // Households routes
    Route::get('/households', [HouseholdController::class, 'index'])->name('households.index');
    Route::post('/households', [HouseholdController::class, 'register'])->name('households.store');

    // Incidents routes
    Route::get('/incidents', [IncidentController::class, 'view'])->name('incidents.index');

    // Delete routes
    Route::post('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
    Route::post('/officials/delete/{id}', [OfficialController::class, 'delete'])->name('officials.delete');
    Route::post('/residents/delete/{id}', [ResidentController::class, 'delete'])->name('residents.delete');
    Route::post('/households/delete/{id}', [HouseholdController::class, 'delete'])->name('households.delete');
    Route::post('/incidents/delete/{id}', [IncidentController::class, 'delete'])->name('incidents.delete');
});

// Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    Route::delete('/logs/{id}', [LogController::class, 'destroy'])->name('logs.destroy');
    Route::delete('/logs', [LogController::class, 'clear'])->name('logs.clear');
});

require __DIR__.'/auth.php';

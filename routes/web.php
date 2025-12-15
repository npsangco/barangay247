<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\IncidentController;
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

require __DIR__.'/auth.php';

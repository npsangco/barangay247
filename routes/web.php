<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserFeedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Redirect residents to their feed
    if (Auth::user()->isResident()) {
        return redirect()->route('user.feed');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for Residents (User Side)
Route::middleware(['auth', 'role:resident'])->group(function () {
    // Feed and main pages
    Route::get('/feed', [UserFeedController::class, 'index'])->name('user.feed');
    Route::get('/feed/incidents', [UserFeedController::class, 'incidents'])->name('user.incidents');
    Route::get('/feed/projects', [UserFeedController::class, 'projects'])->name('user.projects');

    // Incident routes
    Route::get('/incident/create', [UserFeedController::class, 'createIncident'])->name('user.incident.create');
    Route::post('/incident/store', [UserFeedController::class, 'storeIncident'])->name('user.incident.store');
    Route::get('/incident/{id}', [UserFeedController::class, 'showIncident'])->name('user.incident.show');

    // Project view route
    Route::get('/project/{id}', [UserFeedController::class, 'showProject'])->name('user.project.show');
});

// Routes for Admin and Employee only
Route::middleware(['auth', 'role:admin,employee'])->group(function () {
    // Projects routes
    Route::get('/projects', [ProjectController::class, 'view'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/trash', [ProjectController::class, 'viewTrashed'])->name('projects.trash');
    Route::post('/projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');

    // Officials routes
    Route::get('/officials', [OfficialController::class, 'view'])->name('officials.index');
    Route::post('/officials', [OfficialController::class, 'store'])->name('officials.store');
    Route::put('/officials/{id}', [OfficialController::class, 'update'])->name('officials.update');

    // Residents routes
    Route::get('/residents', [ResidentController::class, 'view'])->name('residents.index');
    Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
    Route::put('/residents/{id}', [ResidentController::class, 'update'])->name('residents.update');

    // Households routes
    Route::get('/households', [HouseholdController::class, 'index'])->name('households.index');
    Route::post('/households', [HouseholdController::class, 'register'])->name('households.store');
    Route::put('/households/{id}', [HouseholdController::class, 'update'])->name('households.update');

    // Incidents routes
    Route::get('/incidents', [IncidentController::class, 'view'])->name('incidents.index');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    Route::put('/incidents/{id}', [IncidentController::class, 'update'])->name('incidents.update');

    // Delete routes
    Route::post('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
    Route::post('/officials/delete/{id}', [OfficialController::class, 'delete'])->name('officials.delete');
    Route::post('/residents/delete/{id}', [ResidentController::class, 'delete'])->name('residents.delete');
    Route::post('/households/delete/{id}', [HouseholdController::class, 'delete'])->name('households.delete');
    Route::post('/incidents/delete/{id}', [IncidentController::class, 'delete'])->name('incidents.delete');
});

// Resident-only routes
Route::middleware(['auth', 'role:resident'])->group(function () {
    Route::get('/resident/projects', [ProjectController::class, 'viewForResidents'])->name('projects.resident');
    Route::get('/resident/incidents', [IncidentController::class, 'viewForResidents'])->name('incidents.resident');
    Route::post('/resident/incidents', [IncidentController::class, 'storeByResident'])->name('incidents.resident.store');
    Route::get('/resident/my-info', [ResidentController::class, 'myInformation'])->name('resident.my-info');
    Route::put('/resident/my-info', [ResidentController::class, 'updateMyInformation'])->name('resident.my-info.update');
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

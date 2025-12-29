<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->isResident()) {
        return redirect()->route('resident.home');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// resident side routes
Route::middleware(['auth', 'role:resident'])->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('resident.home');
    Route::get('/home/incidents', [AdminController::class, 'incidents'])->name('resident.incidents');
    Route::get('/home/projects', [AdminController::class, 'projects'])->name('resident.projects');
    Route::get('/incident/create', [AdminController::class, 'createIncident'])->name('resident.incident.create');
    Route::post('/incident/store', [AdminController::class, 'storeIncident'])->name('resident.incident.store');
    Route::get('/incident/{id}', [AdminController::class, 'showIncident'])->name('resident.incident.show');
    Route::get('/project/{id}', [AdminController::class, 'showProject'])->name('resident.project.show');
});

// admin and employee routes
Route::middleware(['auth', 'role:admin,employee'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'view'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/trash', [ProjectController::class, 'viewTrashed'])->name('projects.trash');
    Route::post('/projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::get('/officials', [OfficialController::class, 'view'])->name('officials.index');
    Route::get('/officials/create', [OfficialController::class, 'create'])->name('officials.create');
    Route::post('/officials', [OfficialController::class, 'store'])->name('officials.store');
    Route::get('/officials/{id}/edit', [OfficialController::class, 'edit'])->name('officials.edit');
    Route::put('/officials/{id}', [OfficialController::class, 'update'])->name('officials.update');
    Route::get('/residents', [ResidentController::class, 'view'])->name('residents.index');
    Route::get('/residents/create', [ResidentController::class, 'create'])->name('residents.create');
    Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
    Route::get('/residents/{id}/edit', [ResidentController::class, 'edit'])->name('residents.edit');
    Route::put('/residents/{id}', [ResidentController::class, 'update'])->name('residents.update');
    Route::get('/households', [HouseholdController::class, 'index'])->name('households.index');
    Route::get('/households/create', [HouseholdController::class, 'create'])->name('households.create');
    Route::post('/households', [HouseholdController::class, 'register'])->name('households.store');
    Route::get('/households/{id}/edit', [HouseholdController::class, 'edit'])->name('households.edit');
    Route::put('/households/{id}', [HouseholdController::class, 'update'])->name('households.update');
    Route::get('/incidents', [IncidentController::class, 'view'])->name('incidents.index');
    Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
    Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
    Route::get('/incidents/{id}/edit', [IncidentController::class, 'edit'])->name('incidents.edit');
    Route::put('/incidents/{id}', [IncidentController::class, 'update'])->name('incidents.update');
    Route::post('/projects/delete/{id}', [ProjectController::class, 'delete'])->name('projects.delete');
    Route::post('/officials/delete/{id}', [OfficialController::class, 'delete'])->name('officials.delete');
    Route::post('/residents/delete/{id}', [ResidentController::class, 'delete'])->name('residents.delete');
    Route::post('/households/delete/{id}', [HouseholdController::class, 'delete'])->name('households.delete');
    Route::post('/incidents/delete/{id}', [IncidentController::class, 'delete'])->name('incidents.delete');
    Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
    Route::post('/archives/restore/project/{id}', [ArchiveController::class, 'restoreProject'])->name('archives.restore.project');
    Route::post('/archives/restore/official/{id}', [ArchiveController::class, 'restoreOfficial'])->name('archives.restore.official');
    Route::post('/archives/restore/resident/{id}', [ArchiveController::class, 'restoreResident'])->name('archives.restore.resident');
    Route::post('/archives/restore/household/{id}', [ArchiveController::class, 'restoreHousehold'])->name('archives.restore.household');
    Route::post('/archives/restore/incident/{id}', [ArchiveController::class, 'restoreIncident'])->name('archives.restore.incident');
});

// Resident-only routes (legacy, can be removed)
Route::middleware(['auth', 'role:resident'])->group(function () {
    // Routes now handled by ResidentController above
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

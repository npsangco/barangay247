<?php

use App\Http\Controllers\IncidentController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', [ProjectController::class, 'view'])->name('projects.index');

Route::get('/profile', [ProjectController::class, 'create'])->name('projects.create');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/incidents', [IncidentController::class, 'view'])->name('incidents.index');
Route::get('/residents', [ResidentController::class, 'view'])->name('residents.index');
Route::get('/officials', [OfficialController::class, 'view'])->name('officials.index');
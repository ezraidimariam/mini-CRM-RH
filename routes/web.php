<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Employee routes (Restricted to Admin and RH)
    Route::resource('employees', EmployeeController::class)->middleware('rh');

    // Conge (leave request) routes
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
    
    // Approval routes (Restricted to Admin and RH)
    Route::post('/conges/{congeRequest}/approve', [CongeController::class, 'approve'])->name('conges.approve')->middleware('rh');
    Route::post('/conges/{congeRequest}/reject', [CongeController::class, 'reject'])->name('conges.reject')->middleware('rh');
    
    Route::delete('/conges/{congeRequest}', [CongeController::class, 'cancel'])->name('conges.cancel');

    // Evaluation routes (Restricted to Admin and RH)
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index')->middleware('rh');
    Route::get('/evaluations/create/{employee?}', [EvaluationController::class, 'create'])->name('evaluations.create')->middleware('rh');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store')->middleware('rh');
});

require __DIR__.'/auth.php';

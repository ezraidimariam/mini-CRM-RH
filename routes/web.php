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

    // Employee routes
    Route::resource('employees', EmployeeController::class);

    // Conge (leave request) routes
    Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
    Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
    Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
    Route::post('/conges/{congeRequest}/approve', [CongeController::class, 'approve'])->name('conges.approve');
    Route::post('/conges/{congeRequest}/reject', [CongeController::class, 'reject'])->name('conges.reject');
    Route::delete('/conges/{congeRequest}', [CongeController::class, 'cancel'])->name('conges.cancel');

    // Evaluation routes
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/create/{employee}', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
});

require __DIR__.'/auth.php';

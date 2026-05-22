<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\DashboardController;
use App\Models\CongeRequest;
use App\Models\Employee;
use App\Models\Evaluation;
use App\Models\LeaveBalance;
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
    Route::get('/conges/{congeRequest}', fn (CongeRequest $congeRequest) => view('conges.show', compact('congeRequest')))->name('conges.show');

    // Approval routes (Restricted to RH only)
    Route::post('/conges/{congeRequest}/approve', [CongeController::class, 'approve'])->name('conges.approve')->middleware('rh.only');
    Route::post('/conges/{congeRequest}/reject', [CongeController::class, 'reject'])->name('conges.reject')->middleware('rh.only');

    Route::delete('/conges/{congeRequest}', [CongeController::class, 'cancel'])->name('conges.cancel');


    // Evaluation routes (Restricted to Admin and RH)
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index')->middleware('rh');
    Route::get('/evaluations/create/{employee?}', [EvaluationController::class, 'create'])->name('evaluations.create')->middleware('rh');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store')->middleware('rh');
    Route::get('/evaluations/{evaluation}', fn (Evaluation $evaluation) => view('evaluations.show', compact('evaluation')))->name('evaluations.show')->middleware('rh');

    Route::get('/balances', function () {
        $balances = LeaveBalance::with('employee')->latest()->paginate(12);
        return view('balances.index', compact('balances'));
    })->name('balances.index')->middleware('rh');

    Route::get('/activity', function () {
        return view('activity.index');
    })->name('activity.index')->middleware('rh');

    Route::get('/notifications', function () {
        return view('notifications.index');
    })->name('notifications.index');

    Route::get('/archive/employees', function () {
        $employees = Employee::onlyTrashed()->latest()->paginate(10);
        return view('archive.employees', compact('employees'));
    })->name('archive.employees')->middleware('rh');
});

require __DIR__.'/auth.php';

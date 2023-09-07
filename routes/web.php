<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeCategoryController;
use App\Http\Controllers\OutcomeController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('outcome-categories', OutcomeCategoryController::class);
Route::resource('outcomes', OutcomeController::class);
Route::resource('incomes', IncomeController::class);

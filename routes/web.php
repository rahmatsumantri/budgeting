<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutcomeCategoryController;

Route::get('/', [DashboardController::class, 'index']);

Route::resource('/outcome-categories', OutcomeCategoryController::class);

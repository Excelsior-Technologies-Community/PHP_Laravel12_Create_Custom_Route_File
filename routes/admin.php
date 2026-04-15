<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/**
 * ADMIN ROUTE FILE
 * ----------------
 * This file handles admin panel routes
 */

Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::get('/users', [AdminController::class, 'users'])
    ->name('admin.users');
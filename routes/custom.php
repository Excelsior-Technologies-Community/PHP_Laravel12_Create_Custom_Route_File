<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

/**
 * CUSTOM ROUTE FILE
 * ------------------
 * This file contains routes separated from web.php
 * for cleaner project structure.
 */

// Home Route
Route::get('/custom', [CustomController::class, 'index'])->name('custom.home');

// About Route
Route::get('/custom/about', [CustomController::class, 'about'])->name('custom.about');

// Contact Route
Route::get('/custom/contact', [CustomController::class, 'contact'])->name('custom.contact');

⭐ Laravel 12 – Custom Route File Demo




Project Name: laravel12-custom-route-demo
Author: Your Name
Status: 🚀 Working / Tutorial Ready

📌 Project Overview

This project demonstrates:

How to create a custom route file instead of the default web.php

How to register the custom route file in Laravel 12

Connecting routes → controller → view

Creating modern UI with glassmorphism

Understanding Laravel route loading internally

🚀 Why Use a Custom Route File?

Laravel defaults:

routes/web.php → Web routes

routes/api.php → API routes

Custom route files are useful for:

Organizing module-specific routes

Admin/User separation

SEO-specific routes

Large projects with clean routing structure

🛠 Features

Clean separation of routes

Home, About, Contact pages

Glassmorphism UI with Bootstrap 5

Modern buttons and animations

Fully responsive

🎯 Prerequisites

PHP >= 8.2

Laravel 12.x

MySQL or any database

Composer

STEP 1: Create Laravel 12 Project
composer create-project laravel/laravel laravel12-custom-route-demo "12.*"
cd laravel12-custom-route-demo
php artisan serve

STEP 2: Configure .env File

Edit .env:

APP_NAME="Laravel12 Custom Route Demo"
APP_ENV=local
APP_KEY=base64:PUT-YOUR-KEY-HERE
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_demo
DB_USERNAME=root
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"


Note: Create database:

CREATE DATABASE laravel12_demo;


.env contains secrets → do not commit to Git

STEP 3: Create Custom Route File
type nul > routes\custom.php


File: routes/custom.php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

/**
 * CUSTOM ROUTE FILE
 * -----------------
 * Contains routes separated from web.php
 */

// Home Route
Route::get('/custom', [CustomController::class, 'index'])->name('custom.home');

// About Route
Route::get('/custom/about', [CustomController::class, 'about'])->name('custom.about');

// Contact Route
Route::get('/custom/contact', [CustomController::class, 'contact'])->name('custom.contact');

STEP 4: Register Custom Route

Edit bootstrap/app.php:

->withRouting(
    web: [
        __DIR__.'/../routes/web.php',
        __DIR__.'/../routes/custom.php',  // <-- Added custom route
    ],
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    channels: __DIR__.'/../routes/channels.php',
)


Laravel 12 now loads both web.php and custom.php.

STEP 5: Create Controller
php artisan make:controller CustomController


File: app/Http/Controllers/CustomController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    // Show Homepage
    public function index()
    {
        return view('custom.index');
    }

    // Show About Page
    public function about()
    {
        return view('custom.about');
    }

    // Show Contact Page
    public function contact()
    {
        return view('custom.contact');
    }
}

STEP 6: Create Views

Folder: resources/views/custom

1️⃣ Home Page (index.blade.php)
<!DOCTYPE html>
<html>
<head>
    <title>Custom Route - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; height: 100vh; display: flex; justify-content: center; align-items: center; margin:0; }
        .glass-card { background: rgba(255,255,255,0.2); padding: 40px; border-radius:20px; width:460px; color:#fff; box-shadow:0 8px 32px rgba(0,0,0,0.2); backdrop-filter: blur(10px); animation: fadeIn 1s ease-in-out; text-align:center;}
        .btn-modern { padding:12px 25px; border-radius:30px; transition:0.3s; }
        .btn-modern:hover { transform: scale(1.1); }
        @keyframes fadeIn { from {opacity:0; transform: translateY(20px);} to {opacity:1; transform: translateY(0);} }
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
        <h1 class="fw-bold">Custom Route Demo</h1>
        <p class="mt-3">Advanced Laravel 12 UI with Glassmorphism</p>
        <a href="/custom/about" class="btn btn-light btn-modern mt-3">About</a>
        <a href="/custom/contact" class="btn btn-dark btn-modern mt-3">Contact</a>
    </div>
</body>
</html>

2️⃣ About Page (about.blade.php)
<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; height:100vh; display:flex; justify-content:center; align-items:center; }
        .glass-card { width:450px; background: rgba(255,255,255,0.2); padding:40px; border-radius:20px; text-align:center; backdrop-filter: blur(12px); color:white;}
        .btn-modern:hover { transform:scale(1.1); }
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg, #ff9966, #ff5e62);">
        <h1>About Page</h1>
        <p>This page is loaded using a custom route file.</p>
        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>
</body>
</html>

3️⃣ Contact Page (contact.blade.php)
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; height:100vh; display:flex; justify-content:center; align-items:center; }
        .glass-card { width:450px; background: rgba(255,255,255,0.2); padding:40px; border-radius:20px; text-align:center; backdrop-filter: blur(12px); color:white;}
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
        <h1>Contact Page</h1>
        <p>This page also comes from the custom route file.</p>
        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>
</body>
</html>

STEP 7: Run the Application
php artisan serve


Open browser:

http://localhost:8000/custom

🌟 Full Project Structure
laravel12-custom-route-demo/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── CustomController.php
│
├── resources/
│   └── views/
│       └── custom/
│           ├── index.blade.php
│           ├── about.blade.php
│           └── contact.blade.php
│
├── routes/
│   ├── web.php
│   └── custom.php
│
└── bootstrap/
    └── app.php

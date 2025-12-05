# ⭐ Laravel 12 – Create Custom Route File & Implement (FULL PROJECT)

**Project Name:** laravel12-custom-route-demo  
**Laravel Version:** 12.x  
**By:** Manasi Patel  
**Date:** 2025  

A simple Laravel 12 project demonstrating how to create a **custom route file**, connect routes to controllers and views, and design a modern UI.

---

## ⭐ Overview

This project demonstrates:

- Creating a **custom route file** separate from `web.php`  
- Registering the custom route in Laravel 12  
- Connecting **routes → controller → view**  
- Building modern UI with **glassmorphism effect**  
- Understanding Laravel’s **route loading process**  

---

## 📁 1. Project Setup

### Install Laravel 12

```bash
composer create-project laravel/laravel laravel12-custom-route-demo "12.*"
cd laravel12-custom-route-demo
php artisan serve
⚙ 2. Configure Database
Update .env:

env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_demo
DB_USERNAME=root
DB_PASSWORD=secret
Create database:

sql

CREATE DATABASE laravel12_demo;
🗄 3. Create Custom Route File
bash

type nul > routes\custom.php
File: routes/custom.php

php

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

// Home Route
Route::get('/custom', [CustomController::class, 'index'])->name('custom.home');

// About Route
Route::get('/custom/about', [CustomController::class, 'about'])->name('custom.about');

// Contact Route
Route::get('/custom/contact', [CustomController::class, 'contact'])->name('custom.contact');
Tip: Use route names (route('custom.home')) and consider grouping with prefixes or middleware if needed.

⚙ 4. Register Custom Route in Laravel 12
Edit bootstrap/app.php:

php

->withRouting(
    web: [
        __DIR__.'/../routes/web.php',
        __DIR__.'/../routes/custom.php',  // <-- Add this
    ],
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    channels: __DIR__.'/../routes/channels.php',
)
🧑‍💻 5. Create Controller
bash

php artisan make:controller CustomController
File: app/Http/Controllers/CustomController.php

php

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
🖥 6. Create Blade Views
Create folder: resources/views/custom/

6.1 index.blade.php (Home Page)
html

<!DOCTYPE html>
<html>
<head>
    <title>Custom Route - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .glass-card { background: rgba(255,255,255,0.2); padding:40px; border-radius:20px; width:460px; color:#fff; box-shadow:0 8px 32px rgba(0,0,0,0.2); backdrop-filter:blur(10px); text-align:center; }
        .btn-modern { padding:12px 25px; border-radius:30px; transition:0.3s; }
        .btn-modern:hover { transform:scale(1.1); }
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg,#6a11cb,#2575fc);">
        <h1 class="fw-bold">Custom Route Demo</h1>
        <p class="mt-3">Advanced Laravel 12 UI with Glassmorphism</p>
        <a href="/custom/about" class="btn btn-light btn-modern mt-3">About</a>
        <a href="/custom/contact" class="btn btn-dark btn-modern mt-3">Contact</a>
    </div>
</body>
</html>
6.2 about.blade.php (About Page)
html

<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; }
        .glass-card { width:450px; background: rgba(255,255,255,0.2); padding:40px; border-radius:20px; text-align:center; backdrop-filter:blur(12px); color:white;}
        .btn-modern:hover { transform:scale(1.1); }
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg,#ff9966,#ff5e62);">
        <h1>About Page</h1>
        <p>This page is loaded using a custom route file.</p>
        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>
</body>
</html>
6.3 contact.blade.php (Contact Page)
html

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family:'Poppins',sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; }
        .glass-card { width:450px; background: rgba(255,255,255,0.2); padding:40px; border-radius:20px; text-align:center; backdrop-filter:blur(12px); color:white;}
    </style>
</head>
<body>
    <div class="glass-card" style="background: linear-gradient(135deg,#11998e,#38ef7d);">
        <h1>Contact Page</h1>
        <p>This page also comes from the custom route file.</p>
        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>
</body>
</html>
🚀 7. Run Application
bash

php artisan serve
Open in browser:

bash

http://localhost:8000/custom
✅ Full Project Structure
vbnet

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

⭐ Laravel 12 – Create Custom Route File & Implement (FULL PROJECT + COMMENTS)

Project Name: laravel12-custom-route-demo
Laravel Version: 12.x



🚀 PROJECT AIM (Simple Explanation)

You will learn:

How to create a custom route file instead of using default web.php

How to register that custom route file in Laravel 12

How to connect routes → controller → view

How to design beautiful UI

How Laravel route loading works internally



📌 Why Custom Route File?

Laravel puts all routes in:

routes/web.php

routes/api.php



But sometimes you want:

clean separation

different module routes

admin routes

user routes

SEO routes

or project-specific routing


STEP 1: Create Laravel 12 Project

composer create-project laravel/laravel laravel12-custom-route-demo "12.*"
cd laravel12-custom-route-demo
php artisan serve


STEP 2:.env file — 

Create (or edit) .env at project root — do not commit to git.

Example .env:

APP_NAME="Laravel12 Custom Route Demo"
APP_ENV=local
APP_KEY=base64:PUT-YOUR-KEY-HERE   # set by `php artisan key:generate`
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

# Database (MySQL example)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_demo
DB_USERNAME=root
DB_PASSWORD=secret

# Cache / Session / Queue drivers (default examples)
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

# Mail (example for development)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"


Explanation (key lines):

APP_NAME — Your app name, used in mails & UI.

APP_ENV — local, production, staging. Controls environment-specific behavior.

APP_KEY — Application encryption key. Run php artisan key:generate to set it. Required for sessions, encryption.

APP_DEBUG — true shows debug info; set false in production.

APP_URL — Base URL used by artisan when generating links; set to your dev or production URL.

DB_* — Database connection settings. Create the DB (laravel12_demo) in your MySQL server and update username/password accordingly.

Example: mysql -u root -p → CREATE DATABASE laravel12_demo;

CACHE_DRIVER, SESSION_DRIVER — Default file-based drivers are fine for local dev. Use redis or database for production if needed.

MAIL_* — Configure for sending emails (SMTP, Mailgun, etc.). Useful if your app sends contact form emails.

Security note: .env contains secrets. Add .env to .gitignore (Laravel does by default). Never push to public repos.

  

So Now we create our own:
✔ routes/custom.php


STEP 3 : Create Custom Route File

Run:
type nul > routes\custom.php

File: routes/custom.php

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


Notes & best practices

Reserving routes/custom.php for frontend/public routes makes it clear which routes are visitor-facing.(Custom.php have frontend side routes & web.php have backend side routes)

Use route names (->name(...)) to generate URLs: route('custom.home').

If you want all custom routes to be prefixed (e.g., / rather than /custom), you can group with a prefix or move root routes. Example grouping:

Route::middleware('web')->group(function () {
    Route::get('/', [CustomController::class, 'index'])->name('home');
    // ...
});




STEP 4:  In Laravel 12 → You do NOT need RouteServiceProvider so please follow below steps:


     1): Open File:

         bootstrap/app.php

     2): Find this section

      You will see something like:

     ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
      )

     3): Add your custom route file here

     Modify it like this:

     ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/custom.php',  // <-- ADD THIS LINE
          ],
       api: __DIR__.'/../routes/api.php',
       commands: __DIR__.'/../routes/console.php',
       channels: __DIR__.'/../routes/channels.php',
     )

  🎉 DONE! Laravel 12 will now automatically load:

    ✔ routes/web.php
    ✔ routes/custom.php



STEP 5: Create Controller

Run:
php artisan make:controller CustomController


File: app/Http/Controllers/CustomController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * Show Homepage (from custom route file)
     */
    public function index()
    {
        return view('custom.index');
    }

    /**
     * Show About Page
     */
    public function about()
    {
        return view('custom.about');
    }

    /**
     * Show Contact Page
     */
    public function contact()
    {
        return view('custom.contact');
    }
}



STEP 6: Create Views Folder

mkdir resources/views/custom and create these files and write code:

1) resources/views/custom/index.blade.php (Main Page)

<!DOCTYPE html>
<html>
<head>
    <title>Custom Route - Home</title>

    <!-- Bootstrap + Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;           
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 20px;
            width: 460px;
            color: #fff;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
        }
        .btn-modern {
            padding: 12px 25px;
            border-radius: 30px;
            transition: 0.3s;
        }
        .btn-modern:hover {
            transform: scale(1.1);
        }
        @keyframes fadeIn {
            from {opacity:0; transform: translateY(20px);}
            to   {opacity:1; transform: translateY(0);}
        }
    </style>
</head>

<body>
    <div class="glass-card text-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
        <h1 class="fw-bold">Custom Route Demo</h1>
        <p class="mt-3">Advanced Laravel 12 UI with Glassmorphism</p>

        <a href="/custom/about" class="btn btn-light btn-modern mt-3">About</a>
        <a href="/custom/contact" class="btn btn-dark btn-modern mt-3">Contact</a>
    </div>
</body>
</html>


2) resources/views/custom/about.blade.php (About Page)

<!DOCTYPE html>
<html>
<head>
    <title>About</title>

    <!-- Bootstrap + Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .glass-card {
            width: 450px;
            background: rgba(255,255,255,0.2);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(12px);
            color: white;
        }

        .btn-modern:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <div class="glass-card" style=" background: linear-gradient(135deg, #ff9966, #ff5e62);">
        <h1>About Page</h1>
        <p>This page is loaded using a custom route file.</p>

        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>

</body>
</html>


3) resources/views/custom/contact.blade.php (Contact Page)

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .glass-card {
            width: 450px;
            background: rgba(255,255,255,0.2);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(12px);
            color: white;
        }
    </style>
</head>

<body>

    <div class="glass-card" style=" background: linear-gradient(135deg, #11998e, #38ef7d);">
        <h1>Contact Page</h1>
        <p>This page also comes from the custom route file.</p>

        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>

</body>
</html>


Step 7: Run the Application

php artisan serve


Open browser:

 http://localhost:8000/mails




⭐ FULL PROJECT STRUCTURE:


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
│   └── custom.php   <-- Your custom route file
│
└── app/Providers/
    └── RouteServiceProvider.php

PHP_Laravel12_Create_Custom_Route_File
---
Project Name: PHP_Laravel12_Create_Custom_Route_File
Laravel Version: 12.x

 Project Aim
---
This project demonstrates how to:

Create a custom route file instead of using only web.php

Register the custom route file in Laravel 12 (new routing method)

Connect routes → controllers → views

Use a clean folder structure for frontend/backend

Understand how Laravel route loading works internally

 Why Custom Route File?
---
Laravel by default provides:

routes/web.php → web routes

routes/api.php → API routes

But big projects need their own files:

Purpose	Route File
Frontend pages	routes/custom.php
Admin panel	routes/admin.php
SEO pages	routes/seo.php
Modular apps	blog.php, shop.php, etc.

Custom route files help maintain clean, separate, scalable routing.

 STEP 1: Create Laravel 12 Project
 Commands:
```
composer create-project laravel/laravel PHP_Laravel12_Create_Custom_Route_File "12.*"
cd PHP_Laravel12_Create_Custom_Route_File
php artisan serve
```

 What this step does?
---
Downloads Laravel 12

Installs dependencies

Starts your local development server

You can now open:
```
 http://127.0.0.1:8000
```

 STEP 2: Configure .env

The .env file contains:

App settings

Database connection

Mail config

Cache/session drivers

 Example .env
```
APP_NAME="Laravel12 Custom Route Demo"
APP_ENV=local
APP_KEY=base64:PUT-YOUR-KEY-HERE
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_demo
DB_USERNAME=root
DB_PASSWORD=secret

# Cache/Session
CACHE_DRIVER=file
SESSION_DRIVER=file

# Mail Example
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

 Generate app key:
```

php artisan key:generate
```

 Never upload .env to GitHub (contains sensitive info)
 STEP 3: Create Custom Route File
 Create file:

Windows:
```
type nul > routes\custom.php
```

Mac/Linux:

touch routes/custom.php

 File: routes/custom.php (FULL CODE + COMMENTS)
```
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;

/**
 * CUSTOM ROUTE FILE
 * ------------------
 * This file handles public-facing (frontend) routes.
 * Useful when separating frontend and backend routes.
 */

Route::get('/custom', [CustomController::class, 'index'])
     ->name('custom.home');     // Home page

Route::get('/custom/about', [CustomController::class, 'about'])
     ->name('custom.about');    // About page

Route::get('/custom/contact', [CustomController::class, 'contact'])
     ->name('custom.contact');  // Contact page
```
 STEP 4: Register Custom Route File in Laravel 12

In Laravel 12, RouteServiceProvider is not used anymore.

You must register routes inside:

 bootstrap/app.php

 Update the routing section:

Find:
```
->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    channels: __DIR__.'/../routes/channels.php',
)
```

Replace with:
```
->withRouting(
    web: [
        __DIR__.'/../routes/web.php',
        __DIR__.'/../routes/custom.php',  // <-- Register custom route file
    ],
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    channels: __DIR__.'/../routes/channels.php',
)
```
 Now Laravel loads:

web.php

custom.php

automatically

 STEP 5: Create Controller
Command:
```
php artisan make:controller CustomController
```
 File: app/Http/Controllers/CustomController.php

(Complete with comments)
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * Load Home Page (custom route)
     */
    public function index()
    {
        return view('custom.index');
    }

    /**
     * Load About Page
     */
    public function about()
    {
        return view('custom.about');
    }

    /**
     * Load Contact Page
     */
    public function contact()
    {
        return view('custom.contact');
    }
}
```
 STEP 6: Create Views Folder & Files
Create folder:
```
mkdir resources/views/custom

```

Inside create:

✔ index.blade.php
✔ about.blade.php
✔ contact.blade.php

 1) resources/views/custom/index.blade.php
```

<!DOCTYPE html>
<html>
<head>
    <title>Custom Route - Home</title>

    <!-- Bootstrap + Poppins Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            padding: 40px;
            border-radius: 20px;
            width: 460px;
            color: #fff;
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
        }
        .btn-modern:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="glass-card text-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
        <h1 class="fw-bold">Custom Route Demo</h1>
        <p class="mt-3">This page loads using routes/custom.php</p>

        <a href="/custom/about" class="btn btn-light btn-modern mt-3">About</a>
        <a href="/custom/contact" class="btn btn-dark btn-modern mt-3">Contact</a>
    </div>
</body>
</html>
```

 2) resources/views/custom/about.blade.php
```

<!DOCTYPE html>
<html>
<head>
    <title>About</title>

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
            padding: 40px;
            border-radius: 20px;
            color: #fff;
            text-align: center;
            backdrop-filter: blur(15px);
        }
    </style>
</head>

<body>
    <div class="glass-card" style="background: linear-gradient(135deg, #ff9966, #ff5e62);">
        <h1>About Page</h1>
        <p>This page is loaded using Laravel custom route file.</p>

        <a href="/custom" class="btn btn-dark mt-3">Back to Home</a>
    </div>
</body>
</html>
```

 3) resources/views/custom/contact.blade.php
```

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
            padding: 40px;
            border-radius: 20px;
            color: #fff;
            text-align: center;
            backdrop-filter: blur(12px);
        }
    </style>
</head>

<body>
    <div class="glass-card" style="background: linear-gradient(135deg, #11998e, #38ef7d);">
        <h1>Contact Page</h1>
        <p>This page comes from custom.php</p>

        <a href="/custom" class="btn btn-dark mt-3">Back to Home</a>
    </div>
</body>
</html>
```

 STEP 7: Run Application
```

php artisan serve
```

 Open in Browser:
```

http://localhost:8000/custom
```

 FULL PROJECT STRUCTURE

```

PHP_Laravel12_Create_Custom_Route_File/
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
    └── app.php        # custom route registered here

 README Completed!


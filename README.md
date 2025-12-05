# Laravel 12 – Custom Route File Demo

**Project Name:** laravel12-custom-route-demo  
**Laravel Version:** 12.x  

---

## 🚀 Project Aim

This project demonstrates how to:

- Create a custom route file instead of using the default `web.php`.
- Register the custom route file in Laravel 12.
- Connect routes to controllers and views.
- Organize routes for clean separation (frontend, admin, SEO, modules, etc.).
- Understand how Laravel route loading works internally.

---

## 📌 Why Custom Route File?

Laravel by default provides:

- `routes/web.php` → for web routes  
- `routes/api.php` → for API routes  

**Custom route files** are useful for:

- Clean separation of modules  
- Admin/user-specific routes  
- SEO-friendly routes  
- Project-specific route organization  

---

## STEP 1: Create Laravel 12 Project

**Commands:**
```bash
composer create-project laravel/laravel laravel12-custom-route-demo "12.*"
cd laravel12-custom-route-demo
php artisan serve
Install Laravel 12 using Composer.

Start the development server.

STEP 2: Configure .env
Set the application name, environment, debug mode, and URL.

Configure the database connection for MySQL or your preferred database.

Set cache, session, and queue drivers.

Configure mail settings for development or production.

Generate the application key.

Keep the .env file secret and do not commit to Git.

Commands:

bash

php artisan key:generate
STEP 3: Create Custom Route File
Create a new route file named custom.php inside the routes folder.

Use it to separate frontend/public routes from backend/admin routes.

Name your routes for easier URL generation and maintainability.

Commands:

bash

type nul > routes\custom.php   # Windows
# OR
touch routes/custom.php        # Mac/Linux
STEP 4: Register Custom Route in Laravel 12
Open the bootstrap/app.php file.

Add the new custom route file to the routing configuration.

Laravel 12 will automatically load both web.php and custom.php.

STEP 5: Create Controller
Create a controller to handle the routes defined in the custom route file.

Connect controller methods to views for each route.

Commands:

bash

php artisan make:controller CustomController
STEP 6: Create Views Folder
Create a folder resources/views/custom/.

Add views for Home, About, and Contact pages.

Apply your preferred UI/UX design for each page.

Commands:

bash

mkdir resources/views/custom
# Then create index.blade.php, about.blade.php, contact.blade.php inside
STEP 7: Run the Application
Start the development server using Artisan.

Open the browser and navigate to the custom routes to test.

Commands:

bash

php artisan serve
Open browser:
http://localhost:8000/custom

⭐ Full Project Structure
bash
Copy code
laravel12-custom-route-demo/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── CustomController.php   # Created via artisan
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
│   └── custom.php   # Custom route file created manually
│
└── bootstrap/
    └── app.php      # Custom route registered here

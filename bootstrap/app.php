<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',

        then: function () {
            // Custom routes (frontend)
            Route::middleware('web')
                ->group(base_path('routes/custom.php'));

            // Admin routes with prefix
            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        },

        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

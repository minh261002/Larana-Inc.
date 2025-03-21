<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/admin.php',
            __DIR__ . '/../routes/host.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'custom.auth' => \App\Http\Middleware\CustomAuthMiddleware::class,
            'admin' => \App\Http\Middleware\AdminLoginMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'login' => \App\Http\Middleware\LoginMiddleware::class,
            'user.host' => \App\Http\Middleware\UserHostMiddleware::class,
            'user.auth' => \App\Http\Middleware\UserAuthMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

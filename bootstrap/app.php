<?php

use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\ResponseCache\Middlewares\CacheResponse;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        health: '/up',
    )->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn() => route('web.homepage'));
        $middleware->alias([
            'verified' => EnsureEmailIsVerified::class,
            'cache' => CacheResponse::class,
        ]);
    })->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

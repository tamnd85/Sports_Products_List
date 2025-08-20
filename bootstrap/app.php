<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Gate;
use App\Models\Review;
use App\Models\Reply;
use App\Policies\ReviewPolicy;
use App\Policies\ReplyPolicy;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register middleware aliases in Laravel 11 style
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();

// Register policies outside the middleware callback
Gate::policy(Review::class, ReviewPolicy::class);
Gate::policy(Reply::class, ReplyPolicy::class);

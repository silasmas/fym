<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->prepend(\App\Http\Middleware\ConfigureForInstallation::class);

        $middleware->alias([
            'installed' => \App\Http\Middleware\EnsureInstalled::class,
            'not.installed' => \App\Http\Middleware\RedirectIfInstalled::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'deploy/init',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

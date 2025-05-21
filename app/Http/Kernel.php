<?php

namespace App\Http\Kernel;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // ...existing code...
    ];

    protected $middlewareGroups = [
        'web' => [
            // ...existing code...
        ],
        'api' => [
            // ...existing code...
        ],
    ];

    protected $routeMiddleware = [
        // ...existing code...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class GlobalMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        error_log("GlobalMiddleware running for URL: " . $request->fullUrl());
        error_log("Request Method: " . $request->method());
        error_log("IP Address: " . $request->ip());
        error_log("User Agent: " . $request->userAgent());

        $response = $next($request);

        return $response;
    }
}

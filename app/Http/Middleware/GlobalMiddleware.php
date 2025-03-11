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
        // Also try error log
        error_log("GlobalMiddleware running for URL: " . $request->fullUrl());

        $response = $next($request);

        // Add headers (this is a visible way to confirm middleware execution)
        $response->header('X-Middleware-Ran', 'Yes-' . time());

        return $response;
    }
}

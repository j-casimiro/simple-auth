<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnderMaintenanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the route is the about page
        if ($request->is('about') && env('ABOUT_PAGE_MAINTENANCE', false)) {
            return response()->view('under-maintenance', [
                'pageTitle' => 'About Page',
                'maintenanceMessage' => 'The About page is currently under maintenance. Please check back later.'
            ]);
        }

        return $next($request);
    }
}

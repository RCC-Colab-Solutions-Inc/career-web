<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetXFrameOptions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Set X-Frame-Options to 'SAMEORIGIN' or 'unset' (as needed)
        // Option 1: Allow same-origin iframes
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        
        // Option 2: Unset X-Frame-Options if you want to allow iframe from anywhere
        // $response->headers->set('X-Frame-Options', 'unset');

        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\CompanyDatabase;

class TokenizedCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        
        if (!$tokenized) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Token not provided',
                'code' => 401,
            ], 401);
        }   

        $company = CompanyDatabase::where('remember_token', $tokenized)->first();
        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token',
                'code' => 401,
            ], 401);
        }
        // Check if the token is expired
        return $next($request);
    }
}

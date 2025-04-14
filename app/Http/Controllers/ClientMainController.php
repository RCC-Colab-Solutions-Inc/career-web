<?php

namespace App\Http\Controllers;

use App\Models\CompanyDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ClientMainController extends Controller
{
    public function dashboardpage()
    {
        if (!Auth::guard('company')->check()) {
            return response()->json([
                $data = [
                'status' => 'error',
                'message' => 'Unauthorized',
                'data' => null,
                'code' => 401,
                'error' => 'Unauthorized',
                'error_description' => 'You are not authorized to access this resource.',
                ]
            ], 401);
        }
        $company = Auth::guard('company')->user();
        if ($company->status !== 'active') {
            return response()->json([
              $data = [
                'status' => 'error',
                'message' => 'Inactive account',
                'data' => null,
                'code' => 403,
                'error' => 'Inactive account',
                'error_description' => 'Your account is inactive. Please contact support.',
              ]
            ], 403);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'Dashboard data retrieved successfully',
            'data' => [
                $data = [
                'user' => Auth::guard('company')->user(),
                ]
            ],
        ]);
        
       
    }

    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
            'token' => 'required|string',
            'remember' => 'boolean',
        ]);

        if (!$this->verifycaptcha($request->token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed',
            ], 422);
        }

        $company = CompanyDatabase::where('representative_email', $request->email)->first();

        if (!$company || !password_verify($request->code, $company->sigin_code)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or code',
            ], 401);
        }

        Auth::guard('company')->login($company, $field['remember'] ?? false);
        session()->regenerate();

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'user' => Auth::guard('company')->user(),
                'company_id' => $company->id,
            ],
        ]);
    }

    private function verifycaptcha($captchaResponse)
    {
        $secretKey = env('RECAPTCHA_SECRET_KEY');

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $secretKey,
            'response' => $captchaResponse,
        ]);

        $result = $response->json();

        return $result['success'] ?? false;
    }
}

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

        //create a remember me token and store it in the session
        if ($request->remember) {
            $rememberToken = bin2hex(random_bytes(16));
            Session::put('remember_token', $rememberToken);
            $company->update(['remember_token' => $rememberToken]);
        }
        //login the user
        Auth::guard('company')->login($company, $request->remember);
        //update the remember token in the database
        $company->update(['remember_token' => Session::get('remember_token')]);

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'user' => Auth::guard('company')->user(),
                'remember_token' => Session::get('remember_token'),
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

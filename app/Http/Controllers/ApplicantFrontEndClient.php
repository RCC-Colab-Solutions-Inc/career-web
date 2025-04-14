<?php

namespace App\Http\Controllers;
use App\Models\ApplicantsApplication;
use App\Models\JobPosting;
use App\Models\CompanyDatabase;
use App\Models\ApplicantStatus;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
class ApplicantFrontEndClient extends Controller
{
    public function checkapplicant(Request $request)
    {
        $request->validate([
            'application_code' => 'required',
            'token' => 'required',
        ]);

        // //return the message failed in json during validation
        // if ($request->fails()) {
        //     return response()->json([
        //         'status' => 'failed',
        //         'message' => $request->errors(),
        //     ]);
        // }

        if (!$this->verifycaptcha($request->token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed',
            ], 422);
        }

        $applicationCode = $request->application_code;
        $applicant = ApplicantsApplication::where('reference_code', $applicationCode)->first();
        if (!$applicant) {
            return response()->json([
                'status' => 'error',
                'message' => 'Application not found',
            ], 404);
        }else{
            $name = $applicant->firstname . ' ' . $applicant->lastname;
            $job = JobPosting::where('id', $applicant->priority_job_id)->first();
            if ($job) {
                $jobTitle = $job->job_title;
            } else {
                $jobTitle = 'N/A';
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Application found',
                'data' => [
                    'name' => $name,
                    'email' => $applicant->email,
                    'application_status' => $applicant->applicant_status,
                    'job_title' => $jobTitle
                ],
            ]);
        }


        
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

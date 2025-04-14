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
    public function getjob(){
        //get all the job where the status is open order by created_at
        $jobs = JobPosting::where('jobstatus', 'open')->orderBy('created_at', 'desc')->get();
        return response()->json(
            [
                'status' => 'success',
                'code' => 200,
                'message' => 'Job list',
                'data' => $jobs,
                'timestamp' => now()->toDateTimeString()
            ]
        );

    }
    
    public function apply(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'job_id_1' => 'required|exists:jobpostings,id',
            'job_id_2' => 'nullable|exists:jobpostings,id',
            'job_id_3' => 'nullable|exists:jobpostings,id',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'link_portfolio' => 'nullable|url',
            'captcha' => 'required'
        ]);
            // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'timestamp' => Carbon::now()->toDateTimeString()
            ], 422);
        }
        // Verify reCAPTCHA
        $recaptchaSecret = env('RECAPTCHA_SECRET');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $recaptchaSecret,
            'response' => $request->captcha,
            'remoteip' => $request->ip(),
        ]);

        $result = $response->json();

        if (!$result['success']) {
            return response()->json([
                'status' => 'error',
                'code' => 422,
                'message' => 'reCAPTCHA verification failed.',
                'timestamp' => Carbon::now()->toDateTimeString()
            ], 422);
        }

        // Success response (You can add your database saving logic here)
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Application submitted successfully',
            'data' => $request->all(),
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);
    }

    public function uploadcv(Request $request){
        $validator = Validator::make($request->all(), [
            'cv' => 'required|mimes:pdf|max:2048',
        ]);
       //upload it to cloudinary
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'timestamp' => Carbon::now()->toDateTimeString()
            ], 422);
        }
        //upload it to cloudinary
        $file = $request->file('cv');
        $path = $file->store('cv', 'cloudinary');
        
        //get the url of the file
        $url = Storage::disk('cloudinary')->url($path);
        //return the url
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'CV uploaded successfully',
            'data' => [
                'url' => $url
            ],
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);

    }


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
                $jobTitle = $job->jobtitle;
            } else {
                $jobTitle = 'N/A';
            }
            //get all the status of the application
            $statuses = ApplicantStatus::where('applicant_id', $applicant->id)->get();
            $applicantstatuses = [];
            foreach ($statuses as $status) {
                $applicantstatuses[] = [
                    'status' => $status->applicant_status,
                    'date' => $status->created_at->format('Y-m-d'),
                ];
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Application found',
                'data' => [
                    'name' => $name,
                    'email' => $applicant->email,
                    'phone' => $applicant->contact_number,
                    'application_status' => $applicant->applicant_status,
                    'position' => $jobTitle,
                    'date_applied' => $applicant->created_at->format('Y-m-d'),
                ],
                'statuses' => $applicantstatuses,
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

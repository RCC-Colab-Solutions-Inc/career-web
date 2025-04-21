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
// usse validator
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;
class ApplicantFrontEndClient extends Controller
{
    public function uploadcv(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => 422,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'timestamp' => Carbon::now()->toDateTimeString()
            ], 422);
        }

        $file = $request->file('cv');

        if (!$file->isValid() || $file->getClientOriginalExtension() !== 'pdf') {
            return response()->json([
                'status' => 'error',
                'code' => 422,
                'message' => 'Invalid file type. Only PDF files are allowed.',
                'timestamp' => Carbon::now()->toDateTimeString()
            ], 422);
        }

        // Create uploads directory if it doesn't exist
        $destinationPath = public_path('uploads');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Generate unique name
        $unique = Str::random(8); // e.g., "X8f92Kf1"
        $originalName = $file->getClientOriginalName(); // e.g., "my_cv.pdf"
        $fileName = $unique . '_' . $originalName;

        // Move file to public/uploads
        $file->move($destinationPath, $fileName);

        $url = asset("uploads/$fileName");

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'CV uploaded successfully',
            'data' => [
                'url' => "$fileName",
            ],
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);
    }




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
    public function getSpecificJob($id){
        //get the job where the id is the same as the id in the url
        $job = JobPosting::where('jobcode', $id)->first();
        if (!$job) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => 'Job not found',
                'timestamp' => now()->toDateTimeString()
            ], 404);
        }
        return response()->json(
            [
                'status' => 'success',
                'code' => 200,
                'message' => 'Job details',
                'data' => $job,
                'timestamp' => now()->toDateTimeString()
            ]
        );
    }
    
    public function apply(Request $request){
       //apply here 
       
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

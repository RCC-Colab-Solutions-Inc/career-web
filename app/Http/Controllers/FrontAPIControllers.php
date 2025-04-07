<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FrontAPIControllers extends Controller
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
}

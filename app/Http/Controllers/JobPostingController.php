<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\ApplicantsApplication;
use App\Models\CompanyDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class JobPostingController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function jobListing()
    {
        $jobs = JobPosting::withCount('applicants')
            ->orderBy('created_at', 'desc')
            ->paginate(6);
    
        return view('job-listing', compact('jobs'));
    }

    public function addJobForm()
    {
        return view('add-job');
    }

   public function addjob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobtitle' => 'required',
            'jobdescription' => 'required',
            'workplace' => 'required',
            'joblocation' => 'required',
            'jobtype' => 'required',
            'department' => 'required',
            'jobStatus' => 'required',
            'others' => 'required',
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

        // Generate a unique job code
        $jobcode = $this->generateJobCode();

        $job = new JobPosting();
        $job->jobtitle = $request->jobtitle;
        $job->jobcode = $jobcode;
        $job->jobdescription = $request->jobdescription;
        $job->workplace = $request->workplace;
        $job->joblocation = $request->joblocation;
        $job->jobtype = $request->jobtype;
        $job->department = $request->department;
        $job->jobstatus = $request->jobStatus;
        $job->others = $request->others;
        $job->joburgency = $request->has('urgency') ? 'urgent' : 'normal';

        $job->save();

        

        //return to job-listing with return message
        return redirect()->route('job-listing')->with([
            'status' => 'success',
            'code' => 201,
            'message' => 'Job posting created',
            'jobcode' => $jobcode,
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 201);

        
    }

    /**
     * Generate a unique job code
     */
    private function generateJobCode()
    {
        $maxAttempts = 10; // Limit attempts to prevent infinite loop
        $attempts = 0;

        do {
            $jobcode = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8));
            $exists = JobPosting::where('jobcode', $jobcode)->exists();
            $attempts++;

            if ($attempts >= $maxAttempts) {
                throw new \Exception("Failed to generate a unique job code after $maxAttempts attempts.");
            }

        } while ($exists);

        return $jobcode;
    }

    public function company()
    {
        // Select all companies and paginate with 10 records per page
        $companies = CompanyDatabase::orderBy('created_at', 'desc')->paginate(10);
    
        return view('company', compact('companies'));
    }

    public function user()
    {

        return view('users');
    }

    public function applicantlogin()
    {
        return view('applicant-login');
    }

    public function applicantform()
    {
        return view('applicant-form');
    }


    
}

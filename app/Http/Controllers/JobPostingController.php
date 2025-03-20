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
        $companies = CompanyDatabase::all();
        return view('add-job', compact('companies'));
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
        $job->companyid = $request->company;
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
        return redirect()->route('job-listing')->with('success','Job added successfully');

        
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

    public function myprofile()
    {
        return view('profile');
    }


    public function makeurgent($jobid)
    {
        //check if the joburgency is normal then update to urgent 
        $job = JobPosting::find($jobid);
        if ($job->joburgency == 'normal') {
            $job->joburgency = 'urgent';
            $job->save();
        }else{
            $job->joburgency = 'normal';
            $job->save();
        }
        //return to job-listing with return message of success
        return redirect()->route('job-listing')->with([
            'status' => 'success',
            'code' => 200,
            'message' => 'Job urgency updated',
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);
    }
    public function jobstatus($jobid)
    {
        //check if the jobstatus is open then update to closed 
        $job = JobPosting::find($jobid);
        if ($job->jobstatus == 'open') {
            $job->jobstatus = 'closed';
            $job->save();
        }else{
            $job->jobstatus = 'open';
            $job->save();
        }
        return redirect()->route('job-listing')->with([
            'status' => 'success',
            'code' => 200,
            'message' => 'Job status updated',
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);
    }
    public function jobdelete($jobid)
    {
        //delete job
        $job = JobPosting::find($jobid);
        $job->delete();
        return redirect()->route('job-listing')->with([
            'status' => 'success',
            'code' => 200,
            'message' => 'Job deleted',
            'timestamp' => Carbon::now()->toDateTimeString()
        ], 200);
    }
}

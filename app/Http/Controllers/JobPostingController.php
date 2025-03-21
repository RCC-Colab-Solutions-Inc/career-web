<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\ApplicantsApplication;
use App\Models\CompanyDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class JobPostingController extends Controller
{
    

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
            ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
            return back();
            
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

        

        ToastMagic::success('Success','Successfully Added');
        return redirect()->route('job-listing');

        
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
            $mess = 'Job urgency updated to urgent';
            $job->save();
        }else{
            $job->joburgency = 'normal';
            $mess = 'Job urgency updated to normal';
            $job->save();
        }
        ToastMagic::success('Success',$mess);
        return back();
    }
    public function jobstatus($jobid)
    {
        //check if the jobstatus is open then update to closed 
        $job = JobPosting::find($jobid);
        if ($job->jobstatus == 'open') {
            $job->jobstatus = 'closed';
            $message = 'Job status updated to closed';
            $job->save();
        }else{
            $job->jobstatus = 'open';
            $message = 'Job status updated to open';
            $job->save();
        }
        ToastMagic::success('Success',$message);
        return back();
    }
    public function jobdelete($jobid)
    {
        //delete job
        $job = JobPosting::find($jobid);
        $job->delete();
        ToastMagic::success('Success','Successfully Deleted');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantsApplication;
use App\Models\JobPosting;

class ApplicantController extends Controller
{
    public function applicants()
    {
        //get all applicants and concat the jobposting.id to the applicants_application.priority_job_id and paginate 10
        $applicants = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
        ->select('applicants_applications.*', 'job_postings.jobtitle', 'job_postings.department')
        ->paginate(10);
      
            
        return view('applicants', compact('applicants'));
    }

    public function selectapplicant($jobid)
    {
        //get all applicants and concat the jobposting.id to the applicants_application.priority_job_id and paginate 10
        $applicants = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
        ->select('applicants_applications.*', 'job_postings.jobtitle', 'job_postings.department')
        ->where('job_postings.id', $jobid)
        ->paginate(10);
      
            
        return view('selectapplicants', compact('applicants'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantsApplication;
use App\Models\JobPosting;
use App\Models\CompanyDatabase;
use App\Models\ApplicantStatus;
use Devrabiul\ToastMagic\Facades\ToastMagic;

//use validate
use Illuminate\Support\Facades\Validator;
class ApplicantController extends Controller
{
    public function applicants()
    {
        //get all applicants and concat the jobposting.id to the applicants_application.priority_job_id and paginate 10
        $applicants = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
        ->join('applicant_statuses', 'applicants_applications.id', '=', 'applicant_statuses.applicant_id')
        ->select(
            'applicants_applications.*',
            'job_postings.jobtitle',
            'job_postings.department',
            'applicant_statuses.applicant_status', // Add any specific column you need from applicant_statuses
        )
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
    public function updateapplicantstatus(Request $request)
    {
        $mail = new MailSettingController();
        //check if there applicantid is in the request
       
           
        $validation = Validator::make($request->all(), [
            'applicantid' => 'required|exists:applicants_applications,id',
            'status' => 'required',
        ]);

        //return the validation error if there is any
        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                ToastMagic::error("Error!", $error);
            }
            return redirect()->back();
        }

        // //update the status of the applicant
        // $applicant = ApplicantsApplication::where('id', $request->input('applicantid'))
        // $applicant->applicant_status = $request->input('status');
        
        // $app = $applicant->save();
        // if($app){
            
        // }





            
        

    }
    public function forwardtoclient(Request $request)
    {
        $mail = new MailSettingController();
        //check if there applicantid is in the request
        if($request->has('applicantid')){
            //update the status of the applicant
            $applicant = ApplicantsApplication::find($request->input('applicantid'));
            $applicant->clientview = "Yes";
            $applicant->save();
            if($applicant->save()){
                //get the priority_job_id of the applicant
                $pjob = $applicant->priority_job_id;
                
                //select the jobposting and company_database innerjoin by jobposting.companyid and company_database.id where jobposting.id = $pjob
                $job = JobPosting::join('company_databases', 'job_postings.companyid', '=', 'company_databases.id')
                ->select('job_postings.*', 'company_databases.company_name', 'company_databases.representative_email')
                ->where('job_postings.id', $pjob)
                ->first();
                
                
               

                
                $companyemail = $job->representative_email;
                $subject = "New applicant for your job posting";
                $cc = ['automatic-message@rcccolabsolutions.com']; 
                $bcc = ['automatic-message@rcccolabsolutions.com']; 
                $body = view('emails.newcv')->render();
                $sendMail = $mail->sendMail($companyemail, $subject, $body,$cc, $bcc);

                //if the mail is sent successfully
                if ($sendMail === true) {
                    //return success message
                    ToastMagic::success("Success!", "Applicant forwarded to client successfully.");
                    return redirect()->back();
                } else {
                    //if not return error
                    ToastMagic::error("Error!", "Something went wrong.");
                    return redirect()->back();
                }
            }else
            {
                //if not return error
                ToastMagic::error("Error!", "Something went wrong.");
                return redirect()->back();
            }
           
        }else{
            //if not return error
            ToastMagic::error("Error!", "Something went wrong.");
            return redirect()->back();

        }
    }

}

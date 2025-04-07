<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantsApplication;
use App\Models\JobPosting;
use App\Models\CompanyDatabase;
use App\Models\ApplicantStatus;
use Devrabiul\ToastMagic\Facades\ToastMagic;
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
        if($request->has('applicantid')){
            //update the status of the applicant
            $applicant = ApplicantsApplication::find($request->input('applicantid'));
            
            //get the email of the applicant
            $email = $applicant->email;

            //insert new status to the applicant_statuses table
            $applicantstatus = new ApplicantStatus();
            $applicantstatus->applicant_id = $request->input('applicantid');
            $applicantstatus->applicant_status = $request->input('status');

            $subject = "Your application status has been updated";
            $cc = ['automatic-message@rcccolabsolutions.com']; // Convert to an array
            $bcc = ['automatic-message@rcccolabsolutions.com']; // Convert to an array
            $body = view('emails.status')->render();
            $sendMail = $mail->sendMail($email, $subject, $body,$cc, $bcc);
            //if the mail is sent successfully
            if ($sendMail === true) {
                //save the status
                $applicantstatus->save();
                //return success message
                ToastMagic::success("Success!", "Applicant status updated successfully.");
                return redirect()->back();
            } else {
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

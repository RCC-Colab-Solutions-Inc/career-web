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
    public function applicants(Request $request)
{
    // Start with the base query
    $query = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
        ->select(
            'applicants_applications.id',
            'applicants_applications.*',
            'applicants_applications.applicant_status',
            'job_postings.jobtitle',
            'job_postings.department'
        );
    
    // Apply search filter if provided
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('applicants_applications.firstname', 'like', "%{$search}%")
              ->orWhere('applicants_applications.lastname', 'like', "%{$search}%")
              ->orWhere('applicants_applications.email', 'like', "%{$search}%");
        });
    }
    
    // Filter by job position
    if ($request->has('position') && !empty($request->position)) {
        $query->where('job_postings.jobtitle', $request->position);
    }
    
    // Filter by applicant status
    if ($request->has('status') && !empty($request->status)) {
        $query->where('applicants_applications.applicant_status', $request->status);
    }
    
    // Filter by company (assuming job_postings has a companyid column)
    if ($request->has('company') && !empty($request->company)) {
        $query->where('job_postings.companyid', $request->company);
    }
    
    // Get the results with pagination
    $applicants = $query->paginate(10);
    
    // Append query parameters to pagination links
    $applicants->appends($request->all());
    
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

    public function getApplicantTimeline($applicantId)
    {
        // Validate the applicant exists
        $applicant = ApplicantsApplication::find($applicantId);
        
        if (!$applicant) {
            return response()->json(['error' => 'Applicant not found'], 404);
        }
        
        // Get all status changes for this applicant, ordered by date
        $statusHistory = ApplicantStatus::where('applicant_id', $applicantId)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return response()->json([
            'applicant' => $applicant,
            'statusHistory' => $statusHistory
        ]);
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

       // Step 1: Get the applicant record properly
    $applicant = ApplicantsApplication::find($request->input('applicantid')); // fetches a model instance

    // Step 2: Check if the applicant was found
    if ($applicant) {
        // Step 3: Update the status
        $applicant->applicant_status = $request->input('status');
        $applicant->save(); // persist the update

        // Step 4: Now that the model is saved, get the job posting ID
        $job_posting_id = $applicant->priority_job_id;

        // Step 5: Insert new status tracking record
        $applicantstatus = new ApplicantStatus();
        $applicantstatus->applicant_id = $applicant->id;
        $applicantstatus->applicant_status = $request->input('status');
        $applicantstatus->remarks = $request->input('notes');
        $applicantstatus->job_posting_id = $job_posting_id;
        $applicantstatus->save();

        // Step 6: Show success
        ToastMagic::success("Success!", "Applicant status updated successfully.");
        return redirect()->back();
    }

    // Step 7: Fallback error message
    ToastMagic::error("Error!", "Applicant not found.");
    return redirect()->back();





            
        

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

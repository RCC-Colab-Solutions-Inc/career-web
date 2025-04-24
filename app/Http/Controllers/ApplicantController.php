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
    
    if ($request->has('position') && !empty($request->position)) {
        $query->where('job_postings.jobtitle', $request->position);
    }
    
    if ($request->has('status') && !empty($request->status)) {
        $query->where('applicants_applications.applicant_status', $request->status);
    }
    
    if ($request->has('company') && !empty($request->company)) {
        $query->where('job_postings.companyid', $request->company);
    }
    
    $applicants = $query->paginate(10);
    
    $applicants->appends($request->all());
    
    return view('applicants', compact('applicants'));
}

    public function selectapplicant($jobid)
    {
        $applicants = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
        ->select('applicants_applications.*', 'job_postings.jobtitle', 'job_postings.department')
        ->where('job_postings.id', $jobid)
        ->paginate(10);
      
            
        return view('selectapplicants', compact('applicants'));
    }

    public function getApplicantResume($applicantId)
{
    // Validate the applicant exists
    $applicant = ApplicantsApplication::find($applicantId);
    
    if (!$applicant) {
        return response()->json(['error' => 'Applicant not found'], 404);
    }
    
    $resumeInfo = [
        'has_resume' => !empty($applicant->resume),
        'resume_path' => $applicant->resume,
        'resume_type' => pathinfo($applicant->resume, PATHINFO_EXTENSION) ?? 'pdf'
    ];
    
    return response()->json($resumeInfo);
}

public function viewResume($applicantId)
{
    $applicant = ApplicantsApplication::find($applicantId);
    
    if (!$applicant || empty($applicant->resume)) {
        return abort(404);
    }
    
    $path = public_path('uploads/' . $applicant->resume);
    
    if (!file_exists($path)) {
        $files = glob(public_path('uploads/*_Resume_*.pdf'));
        $found = false;
        
        foreach ($files as $file) {
            if (basename($file) == $applicant->resume) {
                $path = $file;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            return abort(404);
        }
    }
    
    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $applicant->resume . '"',
        'X-Frame-Options' => 'SAMEORIGIN'
    ]);
}

public function downloadResume($applicantId)
{
    $applicant = ApplicantsApplication::find($applicantId);
    
    if (!$applicant || empty($applicant->resume)) {
        return abort(404);
    }
    
    $path = public_path('uploads/' . $applicant->resume);
    
    if (!file_exists($path)) {
        $files = glob(public_path('uploads/*_Resume_*.pdf'));
        $found = false;
        
        foreach ($files as $file) {
            if (basename($file) == $applicant->resume) {
                $path = $file;
                $found = true;
                break;
            }
        }
        
        if (!$found) {
            return abort(404);
        }
    }
    
    return response()->download($path, $applicant->resume);
}

    public function getApplicantTimeline($applicantId)
    {
        $applicant = ApplicantsApplication::find($applicantId);
        
        if (!$applicant) {
            return response()->json(['error' => 'Applicant not found'], 404);
        }
        
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
       
           
        $validation = Validator::make($request->all(), [
            'applicantid' => 'required|exists:applicants_applications,id',
            'status' => 'required',
        ]);

        if ($validation->fails()) {
            foreach ($validation->errors()->all() as $error) {
                ToastMagic::error("Error!", $error);
            }
            return redirect()->back();
        }

    $applicant = ApplicantsApplication::find($request->input('applicantid'));

    if ($applicant) {
        $applicant->applicant_status = $request->input('status');
        $applicant->save();

        $job_posting_id = $applicant->priority_job_id;

        $applicantstatus = new ApplicantStatus();
        $applicantstatus->applicant_id = $applicant->id;
        $applicantstatus->applicant_status = $request->input('status');
        $applicantstatus->remarks = $request->input('notes');
        $applicantstatus->job_posting_id = $job_posting_id;
        $applicantstatus->save();

        $mail = new MailSettingController();
        $email = $applicant->email;
        $reference = $applicant->reference_code;
        $cc = [];
        $bcc = [];
        $subject = "Applicant Status Update";
        $body = view('emails.status', [
            'code' => $reference,
           'link' => env('SANCTUM_STATEFUL_DOMAINS') . '/applicant/portal',
        ])->render();
        $sendMail = $mail->sendMail($email, $subject, $body,$cc, $bcc);

        ToastMagic::success("Success!", "Applicant status updated successfully.");
        return redirect()->back();
    }

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

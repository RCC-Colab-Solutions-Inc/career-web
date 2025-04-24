<?php

namespace App\Http\Controllers;

use App\Models\CompanyDatabase;
use App\Models\EmailAdditional;
use App\Models\ApplicantsApplication;
use App\Models\ApplicantStatus;
use App\Models\JobPosting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ClientMainController extends Controller
{
    public function getapplicantstatus(Request $request){
        $request->validate([
            'applicant_id' => 'required',
            'priority_job_id' => 'required',
        ]);

        
        //get all the status of the application
        $statuses = ApplicantStatus::where('applicant_id', $request->applicant_id)
        ->where('job_posting_id', $request->priority_job_id)
        ->get();

        if ($statuses->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'data' => null,
                'message' => 'No status found for this applicant'
            ], 404);
        }

        $applicantstatuses = [];
        foreach ($statuses as $status) {
            $applicantstatuses[] = [
                'status' => $status->applicant_status,
                'remarks' => $status->remarks,
                'date' => $status->created_at->format('Y-m-d'),
            ];
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Applicant status found',
            'data' => $applicantstatuses,

        ]);


       
    }

    public function companyprofile(Request $request){
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        $company = CompanyDatabase::find($companyId);
        $cc = EmailAdditional::where('company', $companyId)->where('email_type', 'cc')->first();
        //check if theres a record of cc
        if ($cc) {
            $cc = $cc->email;
        }else{
            $cc = null;
        }
        $bcc = EmailAdditional::where('company', $companyId)->where('email_type', 'bcc')->first();
        //check if theres a record of bcc
        if ($bcc) {
            $bcc = $bcc->email;
        }else{
            $bcc = null;
        }
       
        if (!$company) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Company not found',
                'code' => 200,
            ], 200);
        }
        return response()->json([
            'status_tokenized' => 'success',
            'message_tokenized' => 'Token is valid',
            'code' => 200,
            'companydata' => [
                'company_name' => $company->company_name,
                'representative_name' => $company->representative_name,
                'company_email' => $company->representative_email,
                'company_phone' => $company->representative_contact_number,
                'status' => $company->status,
                'company_description' => $company->description,
                "cc" => $cc,
                "bcc" => $bcc,
               
            ],
        ]);


       
    }

    // Select Applicant
    public function selectapplicants(Request $request)
    {
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        //select all applicant concat with job posting where jobposting.company_id = companyId and applicants.clientview = yes
        $applicants = ApplicantsApplication::join('job_postings', 'applicants_applications.priority_job_id', '=', 'job_postings.id')
            ->where('job_postings.companyid', $companyId)
            ->where('applicants_applications.clientview', 'Yes')
            ->select('applicants_applications.*','job_postings.jobtitle')

            ->get();
        
        if ($applicants->isEmpty()) {
            return response()->json([
                'status_tokenized' => 'failed',
                'message_tokenized' => 'No applicants found',
                'code' => 200,
                'applicants' => [],
            ], 200);
        }
        return response()->json([
            'status_tokenized' => 'success',
            'message_tokenized' => 'Token is valid',
            'code' => 200,
            'applicants' => $applicants,
        ]);


       
    }
    public function updateemails(Request $request){
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        //check if the email is already exist
        $cc = EmailAdditional::where('company', $companyId)->where('email_type', 'cc')->first();
        $bcc = EmailAdditional::where('company', $companyId)->where('email_type', 'bcc')->first();
        if ($cc) {
            $cc->email = $request->cc;
            $cc->save();
        }else{
            $cc = new EmailAdditional();
            $cc->company = $companyId;
            $cc->email = $request->cc;
            $cc->email_type = 'cc';
            $cc->save();
        }
        if ($bcc) {
            $bcc->email = $request->bcc;
            $bcc->save();
        }else{
            $bcc = new EmailAdditional();
            $bcc->company = $companyId;
            $bcc->email = $request->bcc;
            $bcc->email_type = 'bcc';
            $bcc->save();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Update Successfully',
            'code' => 200,
            'emails' => [
                'cc' => $cc->email,
                'bcc' => $bcc->email,
            ],
        ]);
    }
    public function positions(Request $request){
        //select * job posting where companyid = companyId
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }
        $jobpostings = JobPosting::where('companyid', $companyId)->get();
        if ($jobpostings->isEmpty()) {
            return response()->json([
                'status_tokenized' => 'failed',
                'message_tokenized' => 'No job postings found',
                'code' => 200,
                'jobpostings' => [],
            ], 200);
        }
        return response()->json([
            'status_tokenized' => 'success',
            'message_tokenized' => 'Token is valid',
            'code' => 200,
            'jobpostings' => $jobpostings,
        ]);
    }
    public function updateapplicant(Request $request)
    {
        $mail = new MailSettingController();
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }
        $field = $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string',
            'remarks' => 'required|string',
        ]);
        // Find the applicant by ID
        $applicant = ApplicantsApplication::find($request->id);
        if (!$applicant) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Applicant not found',
                'code' => 200,
            ], 200);
        }
        // Update the applicant's status and remarks
        $applicant->applicant_status = $request->status;
        $applicant->save();

        //get the applicant priority job id
        $jobId = $applicant->priority_job_id;

        //save new applicant status
        $applicantStatus = new ApplicantStatus();
        $applicantStatus->applicant_id = $request->id;
        $applicantStatus->job_posting_id = $jobId;
        $applicantStatus->applicant_status = $request->status;
        $applicantStatus->remarks = $request->remarks;
        $applicantStatus->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Applicant updated successfully',
            'code' => 200,
        ], 200);
        // //get the name of company
        // $company = CompanyDatabase::find($companyId);
        // $companyName = $company->company_name;

        // //get the name of applicant
        // $applicantName = $applicant->firstname . ' ' . $applicant->lastname;


        //send email to the users
        // $emails = $this->getemailofadmin();
        // $to = .env('MAIL_TO');
        // $subject = "Applicant Status Update";
        // $cc = $emails;
        // $bcc = [];
        // $body = view('emails.updates',[
        //     'company' => $companyName,
        //     'applicant' => $applicantName,
        // ])->render();
        // $sendMail = $mail->sendMail($email, $subject, $body,$cc, $bcc);

        // if ($sendMail === true) {
        //     return response()->json([
        //         'status' = > 'success',
        //         'message' => 'Applicant updated successfully',
        //         'code' => 200,
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'status' => 'failed',
        //         'message' => 'Applicant updated successfully but email not sent',
        //         'code' => 200,
        //     ], 200);
           
        // }

        

        
        

        // $applicant = ApplicantsApplication::find($request->id);
        // if (!$applicant) {
        //     return response()->json([
        //         'status_tokenized' => 'error',
        //         'message_tokenized' => 'Applicant not found',
        //         'code' => 200,
        //     ], 200);
        // }

        // $applicant->clientview = $request->clientview;
        // $applicant->save();

        // return response()->json([
        //     'status_tokenized' => 'success',
        //     'message_tokenized' => 'Applicant updated successfully',
        //     'code' => 200,
        // ]);
    }
  

    public function dashboardpage(Request $request)
    {
       
        $companyId = $this->getCompanyIdByToken($request);
        if (!$companyId) {
            return response()->json([
                'status_tokenized' => 'error',
                'message_tokenized' => 'Invalid token or token not provided',
                'code' => 200,
            ], 200);
        }

        return response()->json([
            'status_tokenized' => 'success',
            'message_tokenized' => 'Token is valid',
            'company_id' => $companyId,
            'code' => 200,
        ]);
       

       

       
    }
    private function getCompanyIdByToken(Request $request)
    {
        // Get the token from the request header
        $tokenized = $request->header('X-Remember-Token');

        if (!$tokenized) {
            return null; // No token provided
        }

        // Look for the company with the provided token
        $company = CompanyDatabase::where('remember_token', $tokenized)->first();

        if (!$company) {
            return null; // Token is invalid
        }

        // Return the company ID if found
        return $company->id;
    }

    public function login(Request $request)
    {
        $field = $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
            'token' => 'required|string',
            'remember' => 'boolean',
        ]);

        if (!$this->verifycaptcha($request->token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed',
            ], 422);
        }

        $company = CompanyDatabase::where('representative_email', $request->email)->first();

        if (!$company || !password_verify($request->code, $company->sigin_code)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid email or code',
            ], 401);
        }

       //generate token
        $token = Str::random(60);
    
        $company->remember_token = $token;
        $company->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'user' => $company->company_name,
                'email' => $company->representative_email,
                'token' => $token,
            ],
        ]);
        

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDatabase;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class CompanyController extends Controller
{
    public function company(Request $request)
{
    // Start with the base query
    $query = CompanyDatabase::query();
    
    // Apply search filter if provided
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('company_name', 'like', "%{$search}%")
              ->orWhere('representative_name', 'like', "%{$search}%")
              ->orWhere('representative_email', 'like', "%{$search}%")
              ->orWhere('representative_contact_number', 'like', "%{$search}%");
        });
    }
    
    // Get the results with pagination
    $companies = $query->orderBy('created_at', 'desc')->paginate(10);
    
    // Append query parameters to pagination links
    $companies->appends($request->all());
    
    return view('company', compact('companies'));
}

    public function addCompanyForm(Request $request)
    {
        $codes = $this->generateSignCode();
        $mail = new MailSettingController();
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_email' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required|regex:/^[0-9+\s()-]+$/',
        ]);

        if ($validator->fails()) {
            ToastMagic::error("Error!", "Something went wrong.");
            return back();
        }

        $company = new CompanyDatabase();
        $company->company_name = $request->company_name;
        $company->representative_name = $request->contact_name;
        $company->representative_email = $request->company_email;
        $company->representative_contact_number = $request->contact_phone;
        $company->sigin_code  = $codes['hashed_sigin_code'];
        $company->save();

        $subject = "Account has been created";
        $cc = ['automatic-message@rcccolabsolutions.com']; // Convert to an array
        $bcc = ['automatic-message@rcccolabsolutions.com'];
        $body  = view('emails.company', [
            'company_name' => $request->company_name,
            'company_email' => $request->company_email,
            'sigin_code' => $codes['sigin_code'],
        ])->render();
        
        $mail->sendMail($request->company_email, $subject, $body, $cc, $bcc);
        ToastMagic::success("Success!", "Company added successfully.");
        return back();


    }

    public function updateCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_email' => 'required | email',
            'contact_name' => 'required',
            'contact_phone' => 'required|regex:/^[0-9+\s()-]+$/',
        ]);

        if ($validator->fails()) {
            ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
            return back();
        }

        $company = CompanyDatabase::find($request->company_id);
        $company->company_name = $request->company_name;
        $company->representative_name = $request->contact_name;
        $company->representative_email = $request->company_email;
        $company->representative_contact_number = $request->contact_phone;
        $company->save();

        ToastMagic::success("Success!", "Company updated successfully.");
        return back();
    }

    private function encryptPasswordeh($genpassword){
        $encrypted = password_hash($genpassword, PASSWORD_DEFAULT);
       return $encrypted;
    }
    private function generateSignCode(){
        ///generate 10 digit random character
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $encrypted = password_hash($randomString, PASSWORD_DEFAULT);
        return [
            'sigin_code' => $randomString,          // plain string
            'hashed_sigin_code' => $encrypted    // hashed version
        ];

    }
}

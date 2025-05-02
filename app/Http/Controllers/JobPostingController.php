<?php

namespace App\Http\Controllers;
use App\Models\JobPosting;
use App\Models\ApplicantsApplication;
use App\Models\CompanyDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Devrabiul\ToastMagic\Facades\ToastMagic;

class JobPostingController extends Controller
{
    

    public function jobListing(Request $request)
{
    $query = JobPosting::withCount('applicants');
    
    // Search by job title or description
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('jobtitle', 'like', "%{$search}%")
              ->orWhere('jobdescription', 'like', "%{$search}%");
        });
    }
    
    // Filter by location
    if ($request->has('location') && !empty($request->location) && $request->location != 'All Locations') {
        $query->where('workplace', $request->location);
    }
    
    // Filter by status
    if ($request->has('status') && !empty($request->status) && $request->status != 'All Statuses') {
        $query->where('jobstatus', strtolower($request->status));
    }
    
    $jobs = $query->orderBy('created_at', 'desc')->paginate(6);
    
    // Append query parameters to pagination links
    $jobs->appends($request->all());
    
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

    public function user(Request $request)
    {
        $query = \App\Models\User::query();
        
        // Search by name or email
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $users = $query->orderBy('created_at', 'desc')->paginate(10);
        
        $users->appends($request->all());
        
        return view('users', compact('users'));
    }

    public function deleteUser($userId)
{
    try {
        $user = \App\Models\User::find($userId);
        
        if (!$user) {
            ToastMagic::error("Error!", "User not found.");
            return back();
        }

        if ($user->id === Auth::id()) {
            ToastMagic::error("Error!", "You cannot delete your own account.");
            return back();
        }

        $userName = $user->name;
        $user->delete();

        ToastMagic::success('Success', "User '{$userName}' has been deleted successfully!");
        return back();
    } catch (\Exception $e) {
        ToastMagic::error("Error!", "An error occurred while deleting the user.");
        return back();
    }
}

public function addUser(Request $request)
{
    $validator = Validator::make($request->all(), [
        'full_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
        ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
        return back();
    }

    $user = new \App\Models\User();
    $user->name = $request->full_name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    ToastMagic::success('Success', 'User added successfully!');
    return back();
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

    public function updatePersonalInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }
    
        try {
            $user = Auth::user();
            $user->name = $request->firstName . ' ' . $request->lastName;
            $user->email = $request->email;
            
            if (Schema::hasColumn('users', 'phone') && $request->has('phone')) {
                $user->phone = $request->phone;
            }
            
            $user->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Personal information updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating user profile: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating your information: ' . $e->getMessage()
            ]);
        }
    }

public function updatePassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8',
        'confirmPassword' => 'required|same:newPassword'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()->first()
        ]);
    }

    $user = Auth::user();
    
    if (!Hash::check($request->currentPassword, $user->password)) {
        return response()->json([
            'status' => 'error',
            'message' => 'Current password is incorrect'
        ]);
    }

    $user->password = Hash::make($request->newPassword);
    $user->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Password updated successfully!'
    ]);
}

    public function positionpage()
    {
        return view('application.position');
    }

    public function ipaddress()
    {
        return view('ip-address');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantSchedule;
use App\Models\ApplicantsApplication;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use App\Services\MicrosoftGraphService;
use Devrabiul\ToastMagic\Facades\ToastMagic;
use App\Http\Controllers\MailSettingController;
use Illuminate\Support\Facades\URL;

class ScheduleController extends Controller
{
    public function index()
    {
        // Fetch all schedules with related data
        $schedules = ApplicantSchedule::join('applicants_applications', 'applicant_schedules.applicant_id', '=', 'applicants_applications.id')
            ->select('applicant_schedules.*', 'applicants_applications.firstname', 'applicants_applications.lastname')
            ->orderBy('applicant_schedules.created_at', 'desc')
            ->get();
            
        return view('schedule', compact('schedules'));
    }
    
    // Create new schedule
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'applicant_id' => 'required|exists:applicants_applications,id',
            'subject' => 'required|string|max:255',
            'attendee' => 'required|string',
            'start_schedule_date' => 'required|date',
            'start_schedule_time' => 'required',
            'end_schedule_date' => 'required|date',
            'end_schedule_time' => 'required',
            'schedule_type' => 'required|string|max:50',
            'location' => 'nullable|string|max:255',
            'remarks' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $applicant = ApplicantsApplication::find($request->applicant_id);
            
            $schedule = new ApplicantSchedule();
            $schedule->applicant_id = $request->applicant_id;
            $schedule->client_id = $applicant->client_id ?? 0;
            $schedule->job_posting_id = $applicant->job_posting_id ?? 0;
            $schedule->subject = $request->subject;
            $schedule->attendee = $request->attendee;
            $schedule->start_schedule_date = $request->start_schedule_date;
            $schedule->start_schedule_time = $request->start_schedule_time;
            $schedule->end_schedule_date = $request->end_schedule_date;
            $schedule->end_schedule_time = $request->end_schedule_time;
            $schedule->schedule_type = $request->schedule_type;
            $schedule->location = $request->location;
            $schedule->status = 'Pending';
            $schedule->remarks = $request->remarks ?? null;
            $schedule->save();

            ToastMagic::success('Success', 'Schedule created successfully');
            return response()->json([
                'status' => 'success',
                'message' => 'Schedule created successfully',
                'data' => $schedule
            ]);
        } catch (\Exception $e) {
            ToastMagic::error("Error!", "An error occurred: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
    
    // Approve or decline schedule
    public function approve(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|exists:applicant_schedules,id',
            'status' => 'required|string|in:Accepted,Declined',
        ]);

        if ($validator->fails()) {
            ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $schedule = ApplicantSchedule::find($request->schedule_id);
        $applicantID = $schedule->applicant_id;
        $subject = $schedule->subject;
        $attendees = json_decode($schedule->attendee, true) ?: [];
        $startRaw = $schedule->start_schedule_date . ' ' . $schedule->start_schedule_time;
        $endRaw = $schedule->end_schedule_date . ' ' . $schedule->end_schedule_time;

        try {
            $formats = [
                'Y-m-d g:i A',
                'Y-m-d H:i:s', 
                'm/d/Y g:i A',
                'd/m/Y g:i A',
                'Y-m-d H:i'
            ];
            
            $start_schedule = null;
            $end_schedule = null;
            
            foreach ($formats as $format) {
                try {
                    $start_schedule = Carbon::createFromFormat($format, $startRaw, 'Asia/Manila')->toIso8601String();
                    $end_schedule = Carbon::createFromFormat($format, $endRaw, 'Asia/Manila')->toIso8601String();
                    break;
                } catch (\Exception $e) {
                    continue;
                }
            }
            
            if (!$start_schedule || !$end_schedule) {
                throw new \Exception('Could not parse date format. Start: ' . $startRaw . ', End: ' . $endRaw);
            }
        } catch (\Exception $e) {
            Log::error('Datetime parsing failed', [
                'startRaw' => $startRaw,
                'endRaw' => $endRaw,
                'error' => $e->getMessage(),
            ]);
            ToastMagic::error("Error!", "Invalid date/time format");
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid date/time format'
            ], 500);
        }

        $applicant = ApplicantsApplication::find($applicantID);
        $email = $applicant->email ?? null;
        
        if (!is_array($attendees)) {
            $attendees = [];
        }
        
        if ($email && !in_array($email, $attendees)) {
            $attendees[] = $email;
        }
        
        if($schedule->status == 'Accepted'){
            ToastMagic::error("Error!", "Schedule already accepted");
            return response()->json([
                'status' => 'error',
                'message' => 'Schedule already accepted',
            ], 422);
        }
        
        if($request->status == 'Accepted'){

            $schedule->status = $request->status;
            $schedule->save();
            
            // Send invitation email
            try {
                $mail = new MailSettingController();
                $urls = $this->generateSecureUrls($schedule->id);

                $displayDate = Carbon::parse($schedule->start_schedule_date)->format('F d, Y');
                
                $emailBody = view('emails.invitation', [
                    'interviewTitle' => $subject,
                    'title' => $subject,
                    'date' => $displayDate,
                    'time' => $schedule->start_schedule_time . ' - ' . $schedule->end_schedule_time,
                    'acceptUrl' => $urls['acceptUrl'],
                    'declineUrl' => $urls['declineUrl']
                ])->render();
                
                $mail->sendMail(
                    $email,
                    'Interview Invitation - ' . $subject,
                    $emailBody,
                    [],
                    []
                );
                
                ToastMagic::success('Success', 'Schedule approved and invitation sent');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Schedule approved and invitation sent',
                    'data' => $schedule,
                ]);
            } catch (\Exception $e) {
                Log::error('Failed to send invitation email: ' . $e->getMessage());
                ToastMagic::warning('Warning', 'Schedule approved but email failed to send');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Schedule approved but email failed to send',
                    'data' => $schedule,
                ]);
            }
        } else {
            $schedule->status = $request->status;
            $schedule->save();
            
            ToastMagic::info('Info', 'Schedule declined');
            return response()->json([
                'status' => 'success',
                'message' => 'Schedule declined',
                'data' => $schedule,
            ]);
        }
    }
    
    private function generateSecureUrls($scheduleId)
    {
        $acceptUrl = URL::temporarySignedRoute(
            'schedule.respond',
            now()->addDays(7),
            ['scheduleId' => $scheduleId, 'response' => 'accept']
        );
        
        $declineUrl = URL::temporarySignedRoute(
            'schedule.respond',
            now()->addDays(7),
            ['scheduleId' => $scheduleId, 'response' => 'decline']
        );
        
        return compact('acceptUrl', 'declineUrl');
    }

    // Respond to invitation
    public function respondToInvitation(Request $request, $scheduleId, $response)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Invalid or expired link');
        }
        
        $schedule = ApplicantSchedule::find($scheduleId);
        if (!$schedule) {
            abort(404, 'Schedule not found');
        }
        
        if ($schedule->status !== 'Accepted') {
            abort(400, 'This invitation is no longer valid');
        }
        
        $applicant = ApplicantsApplication::find($schedule->applicant_id);
        
        if ($response === 'accept') {
            $schedule->is_applicant = '1';
            $schedule->save();
            
            // Create Teams meeting if online
            if ($schedule->schedule_type == 'online') {
                try {
                    $attendees = json_decode($schedule->attendee, true) ?: [];
                    if ($applicant->email && !in_array($applicant->email, $attendees)) {
                        $attendees[] = $applicant->email;
                    }
                    
                    $startRaw = $schedule->start_schedule_date . ' ' . $schedule->start_schedule_time;
                    $endRaw = $schedule->end_schedule_date . ' ' . $schedule->end_schedule_time;
                
                    $formats = [
                        'Y-m-d g:i A',
                        'Y-m-d H:i:s', 
                        'm/d/Y g:i A',
                        'd/m/Y g:i A',
                        'Y-m-d H:i'
                    ];
                    
                    $start_schedule = null;
                    $end_schedule = null;
                    
                    foreach ($formats as $format) {
                        try {
                            $start_schedule = Carbon::createFromFormat($format, $startRaw, 'Asia/Manila')->toIso8601String();
                            $end_schedule = Carbon::createFromFormat($format, $endRaw, 'Asia/Manila')->toIso8601String();
                            break;
                        } catch (\Exception $e) {
                            continue;
                        }
                    }
                    
                    if (!$start_schedule || !$end_schedule) {
                        throw new \Exception('Could not parse date format');
                    }
                    
                    $graph = new MicrosoftGraphService();
                    $response = $graph->createTeamsMeeting(
                        $schedule->subject,
                        $start_schedule,
                        $end_schedule,
                        $attendees
                    );
                    
                    $schedule->meeting_link = $response['onlineMeeting']['joinUrl'] ?? null;
                    $schedule->meetingid = $response['id'] ?? null;
                    $schedule->save();
                    
                    // Send meeting link email
                    $mail = new MailSettingController();
                    $emailBody = view('emails.meeting-confirmation', [
                        'applicantName' => $applicant->firstname . ' ' . $applicant->lastname,
                        'interviewTitle' => $schedule->subject,
                        'date' => Carbon::parse($schedule->start_schedule_date)->format('F d, Y'),
                        'time' => $schedule->start_schedule_time . ' - ' . $schedule->end_schedule_time,
                        'meetingLink' => $schedule->meeting_link,
                        'location' => $schedule->location
                    ])->render();
                    
                    $mail->sendMail(
                        $applicant->email,
                        'Interview Confirmed - Meeting Details',
                        $emailBody,
                        [],
                        []
                    );
                } catch (\Exception $e) {
                    Log::error('Failed to create meeting or send email: ' . $e->getMessage());
                }
            } else {
                // Send physical location confirmation
                try {
                    $mail = new MailSettingController();
                    $emailBody = view('emails.meeting-confirmation', [
                        'applicantName' => $applicant->firstname . ' ' . $applicant->lastname,
                        'interviewTitle' => $schedule->subject,
                        'date' => Carbon::parse($schedule->start_schedule_date)->format('F d, Y'),
                        'time' => $schedule->start_schedule_time . ' - ' . $schedule->end_schedule_time,
                        'meetingLink' => null,
                        'location' => $schedule->location
                    ])->render();
                    
                    $mail->sendMail(
                        $applicant->email,
                        'Interview Confirmed - Location Details',
                        $emailBody,
                        [],
                        []
                    );
                } catch (\Exception $e) {
                    Log::error('Failed to send confirmation email: ' . $e->getMessage());
                }
            }
            
            return view('emails.response', [
                'status' => 'accepted',
                'message' => 'You have successfully accepted the interview invitation. Meeting details have been sent to your email.'
            ]);
        } else {
            // Handle decline
            $schedule->status = 'Declined';
            $schedule->remarks = 'Declined by applicant';
            $schedule->save();
            
            return view('emails.response', [
                'status' => 'declined',
                'message' => 'You have declined the interview invitation.'
            ]);
        }
    }

    // Cancel schedule
    public function cancel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|exists:applicant_schedules,id',
            'message' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            ToastMagic::error("Error!", implode(", ", $validator->errors()->all()));
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $schedule = ApplicantSchedule::find($request->schedule_id);

            if (!$schedule) {
                ToastMagic::error("Error!", "Schedule not found");
                return response()->json([
                    'status' => 'error',
                    'message' => 'Schedule not found',
                ], 404);
            }

            // Cancel Teams meeting if exists
            if ($schedule->status === 'Accepted' && $schedule->meetingid && $schedule->schedule_type === 'online') {
                try {
                    $graph = new MicrosoftGraphService();
                    $graph->cancelTeamsMeeting($schedule->meetingid);
                } catch (\Exception $e) {
                    Log::error('Failed to cancel Teams meeting: ' . $e->getMessage());
                }
            }
            
            $schedule->status = 'Cancelled';
            $schedule->remarks = $request->message ?? 'Cancelled by admin';
            $schedule->save();
            
            // Send cancellation email if applicant email exists
            $applicant = ApplicantsApplication::find($schedule->applicant_id);
            if ($applicant && $applicant->email && $schedule->status !== 'Pending') {
                try {
                    $mail = new MailSettingController();
                    $emailBody = view('emails.interview-cancelled', [
                        'applicantName' => $applicant->firstname . ' ' . $applicant->lastname,
                        'interviewTitle' => $schedule->subject,
                        'date' => Carbon::parse($schedule->start_schedule_date)->format('F d, Y'),
                        'time' => $schedule->start_schedule_time,
                        'reason' => $request->message ?? 'No reason provided'
                    ])->render();
                    
                    $mail->sendMail(
                        $applicant->email,
                        'Interview Cancelled - ' . $schedule->subject,
                        $emailBody,
                        [],
                        []
                    );
                } catch (\Exception $e) {
                    Log::error('Failed to send cancellation email: ' . $e->getMessage());
                }
            }

            ToastMagic::success('Success', 'Schedule cancelled successfully');
            return response()->json([
                'status' => 'success',
                'message' => 'Schedule cancelled successfully',
                'data' => $schedule,
            ]);
        } catch (\Exception $e) {
            ToastMagic::error("Error!", "Error cancelling schedule: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error cancelling schedule: ' . $e->getMessage(),
            ], 500);
        }
    }
}
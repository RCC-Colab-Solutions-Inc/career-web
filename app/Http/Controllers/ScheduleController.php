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
            $schedule = new ApplicantSchedule();
            $schedule->applicant_id = $request->applicant_id;
            $schedule->client_id = $request->client_id ?? null;
            $schedule->job_posting_id = $request->job_posting_id ?? null;
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
    
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schedule_id' => 'required|exists:applicant_schedules,id',
            'subject' => 'required|string|max:255',
            'start_schedule_date' => 'required|string',
            'start_schedule_time' => 'required|string',
            'end_schedule_date' => 'required|string',
            'end_schedule_time' => 'required|string',
            'schedule_type' => 'required|string|in:online,physical',
            'location' => 'required|string|max:255',
            'remarks' => 'nullable|string',
            'attendee' => 'nullable|string',
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
            $schedule = ApplicantSchedule::findOrFail($request->schedule_id);
        
            $start_time = $request->start_schedule_time;
            if (!preg_match('/am|pm/i', $start_time)) {
                $time = \DateTime::createFromFormat('H:i', $start_time);
                if ($time) {
                    $start_time = $time->format('g:i A');
                }
            }
            
            $end_time = $request->end_schedule_time;
            if (!preg_match('/am|pm/i', $end_time)) {
                $time = \DateTime::createFromFormat('H:i', $end_time);
                if ($time) {
                    $end_time = $time->format('g:i A');
                }
            }
            
            $schedule->subject = $request->subject;
            $schedule->start_schedule_date = $request->start_schedule_date;
            $schedule->start_schedule_time = $start_time;
            $schedule->end_schedule_date = $request->end_schedule_date;
            $schedule->end_schedule_time = $end_time;
            $schedule->schedule_type = $request->schedule_type;
            $schedule->location = $request->location;
            $schedule->remarks = $request->remarks;
            $schedule->attendee = $request->attendee;
            
            if ($schedule->status === 'Accepted' && $schedule->meetingid && $schedule->schedule_type === 'online') {
                try {
                    $attendees = [];
                    
                    if ($request->attendee) {
                        if (is_string($request->attendee) && 
                            (str_starts_with($request->attendee, '[') || str_starts_with($request->attendee, '{'))) {
                            $attendees = json_decode($request->attendee, true) ?? [];
                        } else {
                            $attendees = array_map('trim', explode(',', $request->attendee));
                        }
                    }
                    
                    $applicant = ApplicantsApplication::find($schedule->applicant_id);
                    if ($applicant && $applicant->email) {
                        $attendees[] = $applicant->email;
                    }
                    
                    $startRaw = $request->start_schedule_date . ' ' . $request->start_schedule_time;
                    $endRaw = $request->end_schedule_date . ' ' . $request->end_schedule_time;
                    
                    try {
                        $start_schedule = Carbon::createFromFormat('m/d/Y h:i A', $startRaw, 'Asia/Manila')->toIso8601String();
                        $end_schedule = Carbon::createFromFormat('m/d/Y h:i A', $endRaw, 'Asia/Manila')->toIso8601String();
                    } catch (\Exception $e) {
                        ToastMagic::error("Error!", "Invalid date/time format");
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Invalid date/time format',
                        ], 422);
                    }
                    
                    $graph = new MicrosoftGraphService();
                    $graph->updateTeamsMeeting(
                        $schedule->meetingid,
                        $request->subject,
                        $start_schedule,
                        $end_schedule,
                        array_unique($attendees)
                    );
                } catch (\Exception $e) {
                    Log::error('Failed to update Teams meeting: ' . $e->getMessage());
                }
            }
            
            $schedule->save();
            
            ToastMagic::success('Success', 'Schedule updated successfully');
            return response()->json([
                'status' => 'success',
                'message' => 'Schedule updated successfully',
                'data' => $schedule,
            ]);
        } catch (\Exception $e) {
            ToastMagic::error("Error!", "Error updating schedule: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating schedule: ' . $e->getMessage(),
            ], 500);
        }
    }
    
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
            $start_schedule = Carbon::createFromFormat('m/d/Y h:i A', $startRaw, 'Asia/Manila')->toIso8601String();
            $end_schedule = Carbon::createFromFormat('m/d/Y h:i A', $endRaw, 'Asia/Manila')->toIso8601String();
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
            if ($schedule->schedule_type == 'online') {
                $graph = new MicrosoftGraphService();
                try {
                    $response = $graph->createTeamsMeeting(
                        $subject,
                        $start_schedule,
                        $end_schedule,
                        $attendees
                    );
                    $schedule->meeting_link = $response['onlineMeeting']['joinUrl'] ?? null;
                    $schedule->meetingid = $response['id'] ?? null;
                    $schedule->status = $request->status;
                    $schedule->save();
                    
                    ToastMagic::success('Success', 'Teams meeting created successfully');
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Teams meeting created successfully',
                        'data' => [
                            'url' => $response['onlineMeeting']['joinUrl'] ?? null,
                            'meeting_id' => $response['id'] ?? null,
                        ],
                    ]);
                } catch (\Throwable $e) {
                    ToastMagic::error("Error!", "Error creating Teams meeting: " . $e->getMessage());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Error creating Teams meeting: ' . $e->getMessage(),
                    ], 500);
                }
            } else {
                $schedule->status = $request->status;
                $schedule->save();
                
                ToastMagic::success('Success', 'Schedule accepted successfully');
                return response()->json([
                    'status' => 'success',
                    'message' => 'Schedule accepted successfully',
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
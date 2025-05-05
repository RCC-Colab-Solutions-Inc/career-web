<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantSchedule extends Model
{
    
    protected $fillable = [
        'applicant_id',
        'client_id',
        'job_posting_id',
        'subject',
        'attendee',
        'start_schedule_date',
        'start_schedule_time',
        'end_schedule_date',
        'end_schedule_time',
        'schedule_type',
        'location',
        'status',
        'remarks',
        'meeting_link',
        'meetingid',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    
    protected $fillable = [
        'applicant_id',
        'job_posting_id',
        'applicant_status',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'company_id',
        'applicant_id',
        'job_posting_id',
        'is_active'
    ];

    public function company()
    {
        return $this->belongsTo(CompanyDatabase::class, 'company_id');
    }

    public function applicant()
    {
        return $this->belongsTo(ApplicantsApplication::class, 'applicant_id');
    }

    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
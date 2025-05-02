<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
   
    protected $fillable = [
        'jobtitle',
        'jobdescription',
        'jobtypes',
        'joblocation',
        'jobstatus',
        'others',
        'companyid',
    ];

    public function jobdescription()
    {
        return $this->hasOne(jobdescription::class);
    }

    public function applicants()
    {
        return $this->hasMany(ApplicantsApplication::class, 'priority_job_id', 'id');
    }
}

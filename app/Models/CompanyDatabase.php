<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyDatabase extends Model
{
    

    protected $table = 'company_databases';

    protected $fillable = [
        'company_name',
        'representative_name',
        'representative_email',
        'representative_contact_number',
        'sigin_code',
    ];

    public function job_postings()
    {
        return $this->hasMany(JobPosting::class, 'companyid');
    }

   
}

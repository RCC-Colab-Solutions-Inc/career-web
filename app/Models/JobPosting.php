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
        'others'
    ];

    public function jobdescription()
    {
        return $this->hasOne(jobdescription::class);
    }
}

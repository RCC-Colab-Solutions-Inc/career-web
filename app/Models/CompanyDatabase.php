<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Use this base class
use Illuminate\Notifications\Notifiable;

class CompanyDatabase extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'company_databases';

    protected $fillable = [
        'company_name',
        'representative_name',
        'representative_email',
        'representative_contact_number',
        'sigin_code',
    ];

    protected $guarded = ['id'];

    protected $hidden = [
        'sigin_code',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'sigin_code' => 'hashed',
        ];
    }

    protected function getHashableAttributes(): array
    {
        return [
            'sigin_code',
        ];
    }

    public function job_postings()
    {
        return $this->hasMany(JobPosting::class, 'companyid');
    }
}

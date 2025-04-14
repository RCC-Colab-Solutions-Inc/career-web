<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApplicantsApplicationsSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['New', 'Shortlisted', 'For Interview', 'For Assessment', 'Waiting for Feedback', 'Waiting for Job Offer', 'Hired', 'Rejected'];
        $findus = ['LinkedIn', 'Facebook',  'Google'];
        for ($i = 1; $i <= 20; $i++) {
            DB::table('applicants_applications')->insert([
                'reference_code' => 'REF' . Str::random(8),
                'firstname' => 'Applicant' . $i,
                'middlename' => 'M' . $i,
                'lastname' => 'Lastname' . $i,
                'suffix' => '',
                'email' => 'applicant' . $i . '@example.com',
                'contact_number' => '09' . rand(100000000, 999999999),
                'address' => '123 Street, City ' . $i,
                'linkedin_profile' => 'https://linkedin.com/in/applicant' . $i,
                'github_profile' => 'https://github.com/applicant' . $i,
                'portfolio' => 'https://portfolio.com/applicant' . $i,
                'resume' => 'resume' . $i . '.pdf',
                'priority_job_id' => rand(1, 10),
                'secondary_job_id' => rand(1, 10),
                'third_job_id' => rand(1, 10),
                'source' => $findus[array_rand($findus)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

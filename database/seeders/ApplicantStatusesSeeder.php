<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ApplicantStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('applicant_statuses')->insert([
                'applicant_id' => $i,
                'applicant_status' => 'New',
                'job_posting_id' => $i,
                'remarks' => 'Lorem ipsum' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

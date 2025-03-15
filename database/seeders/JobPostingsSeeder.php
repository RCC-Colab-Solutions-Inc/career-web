<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JobPostingsSeeder extends Seeder
{
    public function run()
    {
        $workplaces = ['On-Site', 'Remote', 'Hybrid'];
        $statuses = ['open', 'closed'];
        $urgencies = ['urgent', 'normal'];
        $jobTypes = ['Full-Time', 'Part-Time', 'Contract', 'Freelance'];

        $jobs = [
            ['DEV001', 'Software Engineer', 'Develop and maintain web applications.', 'IT'],
            ['DEV002', 'Frontend Developer', 'Build user-friendly UI for web applications.', 'IT'],
            ['HR001', 'HR Manager', 'Manage recruitment and employee relations.', 'Human Resources'],
            ['MK001', 'Marketing Specialist', 'Develop and execute marketing campaigns.', 'Marketing'],
            ['FIN001', 'Financial Analyst', 'Analyze financial data and reports.', 'Finance'],
        ];

        foreach ($jobs as $job) {
            DB::table('job_postings')->insert([
                'jobcode' => $job[0],
                'jobtitle' => $job[1],
                'jobdescription' => $job[2],
                'workplace' => $workplaces[array_rand($workplaces)],
                'joblocation' => 'Metro Manila, Philippines',
                'jobtype' => $jobTypes[array_rand($jobTypes)],
                'department' => $job[3],
                'jobstatus' => $statuses[array_rand($statuses)],
                'joburgency' => $urgencies[array_rand($urgencies)],
                'others' => "
                    <h3><strong>Responsibilities:</strong></h3>
                    <ul>
                        <li>Collaborate with teams to develop applications.</li>
                        <li>Write clean, scalable code.</li>
                        <li>Ensure high performance and responsiveness.</li>
                    </ul>
                    <h3><strong>Qualifications:</strong></h3>
                    <ol>
                        <li>Bachelor's degree in related field.</li>
                        <li>At least 2 years of experience.</li>
                        <li>Strong analytical skills.</li>
                    </ol>
                ",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

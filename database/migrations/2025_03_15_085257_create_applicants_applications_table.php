<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants_applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference_code')->unique();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('suffix');
            $table->string('email');
            $table->string('contact_number');
            $table->string('address');
            $table->string('linkedin_profile');
            $table->string('github_profile');
            $table->string('portfolio');
            $table->string('resume');
            $table->string('priority_job_id');
            $table->string('secondary_job_id');
            $table->string('third_job_id');
            $table->enum('applicant_status', ['New','Shortlisted','For Interview','For Assessment','Waiting for Feedback','Waiting for Job Offer','Hired','Rejected'])->default('New');
            $table->string('source');
            $table->enum('clientview', ['Yes','No'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants_applications');
    }
};

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
        Schema::create('applicant_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id')->unsigned();
            $table->integer('job_posting_id')->unsigned();
            $table->enum('applicant_status', ['New','Shortlisted','For Interview','For Assessment','Waiting for Feedback','Waiting for Job Offer','Hired','Rejected'])->default('New');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_statuses');
    }
};

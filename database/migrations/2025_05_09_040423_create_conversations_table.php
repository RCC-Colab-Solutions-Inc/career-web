<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Company/client ID
            $table->unsignedBigInteger('applicant_id'); // Applicant ID
            $table->unsignedBigInteger('job_posting_id')->nullable(); // Associated job
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('company_id')->references('id')->on('company_databases');
            $table->foreign('applicant_id')->references('id')->on('applicants_applications');
            $table->foreign('job_posting_id')->references('id')->on('job_postings');
            
            // Ensure a unique conversation between company and applicant
            $table->unique(['company_id', 'applicant_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
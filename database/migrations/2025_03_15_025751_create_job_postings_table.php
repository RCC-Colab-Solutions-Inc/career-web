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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('jobcode');
            $table->string('jobtitle');
            $table->string('jobdescription');
            $table->string('companyname');
            $table->enum('workplace',['On-Site', 'Remote', 'Hybrid']);
            $table->string('joblocation');
            $table->string('jobtype');
            $table->string('department');
            $table->enum('jobstatus', ['open', 'closed']);
            $table->enum('joburgency', ['urgent', 'normal']);
            $table->text('others');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};

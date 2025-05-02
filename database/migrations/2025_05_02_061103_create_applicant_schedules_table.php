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
        Schema::create('applicant_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('job_posting_id')->unsigned();
            $table->string('subject');
            $table->string('attendee');
            $dateTime('start_schedule_date');
            $table->string('start_schedule_time');
            $table->string('end_schedule_date');
            $table->string('end_schedule_time');
            $table->string('schedule_type');
            $table->string('location');
            $table->enum('status', ['Pending', 'Accepted', 'Declined'])->default('Pending');
            $table->text('remarks')->nullable();
            $table->string('schedule_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_schedules');
    }
};

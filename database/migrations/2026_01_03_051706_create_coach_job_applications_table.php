<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coach_job_applications', function (Blueprint $table) {
            $table->id();

            // Basic applicant details
            $table->string('full_name');
            $table->string('email')->index();
            $table->string('mobile', 20);

            // Professional details
            $table->string('current_location')->nullable();
            $table->string('experience_level')->nullable(); // fresher / junior / mid
            $table->string('primary_skills')->nullable(); // Laravel, PHP, MySQL
            $table->text('about_candidate')->nullable();

            // CV upload
            $table->string('cv_path'); // storage path of CV

            // Application status (HR flow)
            $table->enum('status', [
                'pending',
                'reviewed',
                'shortlisted',
                'rejected',
                'selected'
            ])->default('pending');

            // Admin / HR notes
            $table->text('admin_notes')->nullable();

            // Tracking & metadata
            $table->ipAddress('applied_ip')->nullable();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coach_job_applications');
    }
};

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
        Schema::create('coach_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');   // Coach ID
            $table->unsignedBigInteger('receiver_id'); // Leader ID
            $table->date('task_date');                 // Calendar Date
            $table->text('comments')->nullable();
            $table->string('image')->nullable();       // Image path
            $table->timestamps();

            // Foreign keys (Optional but recommended)
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coach_tasks');
    }
};

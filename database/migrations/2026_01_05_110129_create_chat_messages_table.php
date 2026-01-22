<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');   // Message bhejne wala
            $table->unsignedBigInteger('receiver_id'); // Message receive karne wala
            $table->text('chat')->nullable();          // Message text
            $table->string('file')->nullable();        // File ka path (audio/video/image)
            $table->string('file_type')->nullable();   // Type: 'audio', 'video', 'image', 'document'
            $table->timestamps();                      // created_at aur updated_at

            // Foreign keys (Optional: Agar aapki users table 'users' hai)
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};

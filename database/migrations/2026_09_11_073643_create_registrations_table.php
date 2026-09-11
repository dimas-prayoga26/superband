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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('stage_name')->nullable();
            $table->string('school');
            $table->unsignedTinyInteger('grade');
            $table->string('audition_position');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('instagram_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('required_song_genre');
            $table->string('free_song_title');
            $table->string('audition_video_url');
            $table->string('student_card_path');
            $table->string('photo_path');
            $table->json('commitments');
            $table->string('status')->default('submitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

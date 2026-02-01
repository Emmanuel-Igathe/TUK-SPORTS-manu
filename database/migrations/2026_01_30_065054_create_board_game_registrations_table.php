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
        Schema::create('board_game_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('sport'); // e.g., 'Chess', 'Scrabble'
            $table->string('student_name');
            $table->string('student_id');
            $table->string('email');
            $table->string('phone');
            $table->string('year_of_study');
            $table->string('course');
            $table->string('experience_level');
            $table->string('preferred_style')->nullable();
            $table->text('tournament_experience')->nullable();
            $table->string('availability')->nullable();
            $table->string('emergency_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_game_registrations');
    }
};

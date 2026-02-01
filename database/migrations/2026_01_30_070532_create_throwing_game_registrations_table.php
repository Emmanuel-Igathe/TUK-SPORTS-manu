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
        Schema::create('throwing_game_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('sport'); // e.g., 'Javelin', 'Discus'
            $table->string('student_name');
            $table->string('student_id');
            $table->string('email');
            $table->string('phone');
            $table->string('year_of_study');
            $table->string('course');
            $table->string('experience_level');
            $table->string('preferred_event')->nullable();
            $table->string('personal_best')->nullable();
            $table->text('training_goals')->nullable();
            $table->text('medical_conditions')->nullable();
            $table->string('emergency_contact');
            $table->boolean('waiver_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('throwing_game_registrations');
    }
};

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
        Schema::create('athletics_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('sport');
            $table->string('name');
            $table->string('student_id');
            $table->string('email');
            $table->string('phone');
            $table->string('year');
            $table->string('course');
            $table->string('experience');
            $table->string('preferred_event')->nullable();
            $table->string('personal_best')->nullable();
            $table->text('medical_notes')->nullable();
            $table->string('emergency_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletics_registrations');
    }
};

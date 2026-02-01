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
        Schema::table('players', function (Blueprint $table) {
            $table->string('name');
            $table->string('student_id')->unique();
            $table->string('sport');
            $table->string('year');
            $table->string('status')->default('active');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('name');
            $table->date('date');
            $table->time('time');
            $table->string('location');
            $table->string('sport');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            $table->dropColumn(['name', 'student_id', 'sport', 'year', 'status']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['name', 'date', 'time', 'location', 'sport', 'description']);
        });
    }
};

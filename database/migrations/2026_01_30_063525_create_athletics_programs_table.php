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
        Schema::create('athletics_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->string('head_coach');
            $table->string('assistant_coaches');
            $table->string('year_integrated');
            $table->integer('gold_medals')->default(0);
            $table->integer('silver_medals')->default(0);
            $table->integer('bronze_medals')->default(0);
            $table->integer('base_athlete_count')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletics_programs');
    }
};

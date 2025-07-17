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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('category');
            $table->string('location')->nullable();   //Additional Question, Location Details for Facilities
            $table->string('title');
            $table->text('description');
            $table->dateTime('incident_time');
            $table->string('priority');
            $table->string('image_path')->nullable();
            $table->string('resolution_note')->nullable();
            //Contact Information either Identified Or Anonymous
            $table->boolean('is_anonymous')->default(false);
            $table->string('type_submit');
            $table->string('full_name')->nullable();
            $table->string('student_id_number')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('year_section')->nullable();
            $table->boolean('consent_given');
            $table->string('status')->default('Pending');
            $table->string('complaint_tracker');
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};

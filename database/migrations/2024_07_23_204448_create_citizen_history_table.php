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
        Schema::create('citizen_history', function (Blueprint $table) {
            $table->id('citizen_history_id'); // Primary key
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('lastname');
            $table->string('address');
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->string('citizen_status');
            $table->string('blood_type')->nullable();
            $table->string('height');
            $table->string('weight');
            $table->string('allergies')->nullable();
            $table->string('condition');
            $table->string('medication')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_no');
            $table->json('services_availed')->nullable();
            $table->string('citizen_id'); 
            $table->unsignedBigInteger('diagnostic_id')->nullable(); 
            $table->date('date')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('diagnostic_id')
                  ->references('diagnostic_id')
                  ->on('diagnostics') // Ensure the table name is correct
                  ->onDelete('cascade'); // Cascade on delete

            $table->foreign('citizen_id')
                  ->references('citizen_id')
                  ->on('citizen_details') // Ensure the table name matches
                  ->onDelete('cascade'); // Cascade on delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_history');
    }
};

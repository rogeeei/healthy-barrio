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
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id('diagnostic_id');
            $table->date('date');
            $table->text('diagnosis');
            $table->string('citizen_id')->nullable();
            $table->timestamps();

            // Add the foreign key constraint
        $table->foreign('citizen_id')
              ->references('citizen_id')
              ->on('citizen_details')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnostics');
    }
};

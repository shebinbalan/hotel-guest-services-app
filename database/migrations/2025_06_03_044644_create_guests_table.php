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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('room_number');
            $table->integer('number_of_guests')->default(1);
            $table->date('check_in');
            $table->date('check_out')->nullable();
            $table->string('id_document_type')->nullable(); // e.g., Passport, Driver License
            $table->string('id_document_number')->nullable();
            $table->text('special_requests')->nullable(); // dietary needs, accessibility, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};

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
        Schema::create('bedassigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenantprofile_id')->constrained()->onDelete('cascade'); // Foreign key for Tenantprofile
            $table->string('room_no');
            $table->string('bed_no');
            $table->string('start_date');
            $table->string('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bedassigns');
    }
};

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
        Schema::create('facility_room_masters', function (Blueprint $table) {
            $table->id();
            $table->string('facility_type');
            $table->string('facility_number');
            $table->string('description');
            $table->string('floor');
            $table->integer('max_capacity');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_room_masters');
    }
};

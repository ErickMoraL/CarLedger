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
        Schema::create('maintenance_vehicle_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_id')->constrained('vehicle_maintenances')->cascadeOnDelete();
            $table->foreignId('component_id')->constrained('vehicle_components')->cascadeOnDelete();            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_vehicle_components');
    }
};

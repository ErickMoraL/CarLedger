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
        Schema::create('vehicle_maintenance_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_maintenance_id')->constrained('vehicle_maintenances')->cascadeOnDelete();
            $table->foreignId('vehicle_component_id')->constrained('vehicle_components')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(
                ['vehicle_maintenance_id', 'vehicle_component_id'],
                'vmc_maintenance_component_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_maintenance_components');
    }
};

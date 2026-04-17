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
        Schema::create('vehicle_maintenance_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vehicle_id');
            $table->foreignId('vehicle_maintenance_type_id');
            $table->foreignId('vehicle_component_id')->nullable();
            $table->foreignId('vehicle_maintenance_id')->nullable();

            $table->date('expected_date')->nullable();
            $table->unsignedInteger('expected_kilometers')->nullable();
            $table->string('status', 20)->default('pending'); // enum
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id', 'vms_vehicle_fk')
                ->references('id')
                ->on('vehicles')
                ->cascadeOnDelete();

            $table->foreign('vehicle_maintenance_type_id', 'vms_type_fk')
                ->references('id')
                ->on('vehicle_maintenance_types')
                ->restrictOnDelete();

            $table->foreign('vehicle_component_id', 'vms_component_fk')
                ->references('id')
                ->on('vehicle_components')
                ->nullOnDelete();

            $table->foreign('vehicle_maintenance_id', 'vms_maintenance_fk')
                ->references('id')
                ->on('vehicle_maintenances')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_maintenance_schedules');
    }
};

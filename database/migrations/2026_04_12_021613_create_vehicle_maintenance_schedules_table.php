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

            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('vehicle_maintenance_type_id');
            $table->unsignedBigInteger('vehicle_component_id')->nullable();
            $table->date('expected_date')->nullable();
            $table->unsignedInteger('expected_kilometers')->nullable();
            $table->date('completed_date')->nullable();
            $table->unsignedBigInteger('completed_odometer_log_id')->nullable();
            $table->string('status')->default('pending'); // pending, completed, skipped, overdue
            $table->timestamps();

            $table->foreign('vehicle_id', 'vms_vehicle_fk')
                ->references('id')
                ->on('vehicles')
                ->cascadeOnDelete();

            $table->foreign('vehicle_maintenance_type_id', 'vms_maintenance_type_fk')
                ->references('id')
                ->on('vehicle_maintenance_types')
                ->restrictOnDelete();

            $table->foreign('vehicle_component_id', 'vms_component_fk')
                ->references('id')
                ->on('vehicle_components')
                ->nullOnDelete();

            $table->foreign('completed_odometer_log_id', 'vms_odometer_log_fk')
                ->references('id')
                ->on('vehicle_odometer_logs')
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

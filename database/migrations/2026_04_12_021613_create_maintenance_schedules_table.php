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
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_maintenance_type_id')->constrained('vehicle_maintenance_types')->restrictOnDelete();
            $table->foreignId('vehicle_component_id')->nullable()->constrained()->nullOnDelete();
            $table->date('expected_date')->nullable();
            $table->unsignedInteger('expected_kilometers')->nullable();
            $table->date('completed_date')->nullable();
            $table->foreignId('completed_odometer_log_id')->nullable()->constrained('vehicle_odometer_logs')->nullOnDelete();
            $table->string('status')->default('pending'); // pending, completed, skipped, overdue
            $table->timestamps();
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

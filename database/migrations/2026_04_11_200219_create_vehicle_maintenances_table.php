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
        Schema::create('vehicle_maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_maintenance_type_id')->constrained('vehicle_maintenance_types')->restrictOnDelete();
            $table->foreignId('odometer_log_id')->nullable()->constrained('vehicle_odometer_logs')->nullOnDelete();
            $table->date('service_date');
            $table->decimal('cost', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->string('type')->default('preventive'); // preventive, corrective, etc.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_maintenances');
    }
};

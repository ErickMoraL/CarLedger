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
        Schema::create('vehicle_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete(); // categories table for component categorization
            $table->string('name');
            $table->date('installed_date')->nullable();
            $table->foreignId('installed_odometer_log_id')->nullable()
                ->constrained('vehicle_odometer_logs')
                ->nullOnDelete();
            $table->date('removed_date')->nullable();
            $table->foreignId('removed_odometer_log_id')->nullable()
                ->constrained('vehicle_odometer_logs')
                ->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_components');
    }
};

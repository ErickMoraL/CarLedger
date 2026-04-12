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
        Schema::create('vehicle_income_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->date('start_date')->default(now());
            $table->date('end_date')->nullable();
            $table->string('status', 10)->default('active');// e.g., active, paused, completed
            $table->string('frequency')->default('daily');// e.g., daily, weekly, monthly
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_income_plans');
    }
};

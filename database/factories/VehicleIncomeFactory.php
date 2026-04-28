<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleIncome;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleIncome>
 */
class VehicleIncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $receivedDate = $this->faker->dateTimeBetween('-1 year', 'now');

        $periodStart = $this->faker->dateTimeBetween(
            (clone $receivedDate)->modify('-1 month'),
            $receivedDate
        );

        $periodEnd = $this->faker->dateTimeBetween(
            $periodStart,
            $receivedDate
        );

        return [
            'vehicle_id' => Vehicle::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'received_date' => $receivedDate->format('Y-m-d'),
            'period_start' => $periodStart->format('Y-m-d'),
            'period_end' => $periodEnd->format('Y-m-d'),
            'notes' => $this->faker->sentence(),
        ];
    }
}

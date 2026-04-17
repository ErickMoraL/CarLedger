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
        return [
            'vehicle_id' => Vehicle::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 10000),
            'received_date' => $this->faker->date(),
            'period_start' => $this->faker->date(),
            'period_end' => $this->faker->date(),
            'notes' => $this->faker->sentence(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\VehicleOdometerLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

/**
 * @extends Factory<VehicleOdometerLog>
 */
class VehicleOdometerLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' =>Vehicle::factory(),
            'log_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'kilometers' => fake()->numberBetween(0, 1000000),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\VehicleStatusEnum;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'serial_number' => fake()->unique()->bothify('SN-########'),
            'license_plate' => fake()->unique()->bothify('??-####-??'),
            'model' => fake()->word(),
            'manufacturer' => fake()->company(),
            'year' => fake()->numberBetween(1990, date('Y')),
            'color' => fake()->safeColorName(),
            'status' => fake()->randomElement(VehicleStatusEnum::cases()),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Enums\VehicleMaintenanceIntervalTypeEnum;
use App\Models\Vehicle;
use App\Models\VehicleMaintenanceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleMaintenanceType>
 */
class VehicleMaintenanceTypeFactory extends Factory
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
            'name' => $this->faker->unique()->word(),
            'description' => $this->faker->sentence(),
            'interval_type' => $this->faker->randomElement(VehicleMaintenanceIntervalTypeEnum::cases()),
            'default_interval' => $this->faker->optional()->numberBetween(1, 10),
        ];
    }
}

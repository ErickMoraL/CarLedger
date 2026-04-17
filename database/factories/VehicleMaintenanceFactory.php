<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleMaintenance;
use App\Models\VehicleMaintenanceType;
use App\Models\VehicleOdometerLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleMaintenance>
 */
class VehicleMaintenanceFactory extends Factory
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
            'vehicle_maintenance_type_id' => VehicleMaintenanceType::factory(),
            'service_date' => $this->faker->date(),
            'odometer_log_id' => VehicleOdometerLog::factory(),
            'cost' => $this->faker->randomFloat(2, 50, 500),
            'description' => $this->faker->optional()->sentence(),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}

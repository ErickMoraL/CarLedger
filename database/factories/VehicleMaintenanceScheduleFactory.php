<?php

namespace Database\Factories;

use App\Enums\VehicleMaintenanceScheduleStatusEnum;
use App\Models\Vehicle;
use App\Models\VehicleComponent;
use App\Models\VehicleMaintenance;
use App\Models\VehicleMaintenanceSchedule;
use App\Models\VehicleMaintenanceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleMaintenanceSchedule>
 */
class VehicleMaintenanceScheduleFactory extends Factory
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
            'vehicle_component_id' => VehicleComponent::factory(),
            'vehicle_maintenance_id' => VehicleMaintenance::factory(),
            'expected_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'expected_kilometers' => $this->faker->numberBetween(1000, 100000),
            'status' => $this->faker->randomElement(VehicleMaintenanceScheduleStatusEnum::cases()),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vehicle;
use App\Models\VehicleComponent;
use App\Models\VehicleOdometerLog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleComponent>
 */
class VehicleComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $installedDate = fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d');
        $removedDate = fake()->optional(0.3)->dateTimeBetween($installedDate, 'now')?->format('Y-m-d');

        return [
            'vehicle_id' => Vehicle::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->word(),
            'installed_date' => $installedDate,
            'installed_odometer_log_id' => null,
            'removed_date' => $removedDate,
            'removed_odometer_log_id' => null,
            'notes' => fake()->optional()->paragraph(),
        ];

    }

    public function withOdometerLogs(): static
    {
        return $this->afterCreating(function (VehicleComponent $component) {
            $installedLog = VehicleOdometerLog::factory()->create([
                'vehicle_id' => $component->vehicle_id,
            ]);

            $component->installed_odometer_log_id = $installedLog->id;

            if ($component->removed_date) {
                $removedLog = VehicleOdometerLog::factory()->create([
                    'vehicle_id' => $component->vehicle_id,
                ]);

                $component->removed_odometer_log_id = $removedLog->id;
            }

            $component->save();
        });
    }
}

<?php

namespace Database\Factories;

use App\Enums\VehicleExpenseScheduleFrequencyTypeEnum;
use App\Enums\VehicleExpenseScheduleStatusEnum;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\VehicleExpenseSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleExpenseSchedule>
 */
class VehicleExpenseScheduleFactory extends Factory
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
            'category_id' => Category::factory(),
            'amount' => fake()->randomFloat(2, 10, 1000),
            'description' => fake()->optional()->sentence(),
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => fake()->optional()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'status' => fake()->randomElement(VehicleExpenseScheduleStatusEnum::cases()),
            'frequency_type' => fake()->randomElement(VehicleExpenseScheduleFrequencyTypeEnum::cases()),
        ];
    }
}

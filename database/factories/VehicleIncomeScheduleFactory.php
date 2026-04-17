<?php

namespace Database\Factories;

use App\Enums\VehicleIncomeScheduleFrequencyTypeEnum;
use App\Enums\VehicleIncomeScheduleStatusEnum;
use App\Models\VehicleIncomeSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;

/**
 * @extends Factory<VehicleIncomeSchedule>
 */
class VehicleIncomeScheduleFactory extends Factory
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
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->sentence(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'status' => $this->faker->randomElement(VehicleIncomeScheduleStatusEnum::cases()),
            'frequency_type' => $this->faker->randomElement(VehicleIncomeScheduleFrequencyTypeEnum::cases()),
        ];
    }
}

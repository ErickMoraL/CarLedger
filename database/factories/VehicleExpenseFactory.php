<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vehicle;
use App\Models\VehicleExpense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VehicleExpense>
 */
class VehicleExpenseFactory extends Factory
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
            'expense_date' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'description' => fake()->optional()->sentence(),
        ];
    }
}

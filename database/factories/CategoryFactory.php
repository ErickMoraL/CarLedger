<?php

namespace Database\Factories;

use App\Enums\CategoryContextEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
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
            'context' => fake()->randomElement(CategoryContextEnum::cases()),
            'name' => fake()->word(),
            'slug' => fake()->unique()->slug(),

        ];
    }
}

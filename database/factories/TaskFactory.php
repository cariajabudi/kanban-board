<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kanban>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->sentence(),
            "assigned" => fake()->randomElement(["Eka", "Dwi", "Tri"]),
            "target_quantity" => fake()->randomNumber(4, true),
            "description" => fake()->paragraph(3)
        ];
    }
}

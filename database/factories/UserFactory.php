<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    private $values;
    private $index = 0;

    public function __construct($count = 1)
    {
        parent::__construct($count);

        $this->values = [
            [
                "name" => "Admin May",
                "nik" => "123abc",
                "gender" => 0,
                "password" => Hash::make("password"),
                "is_admin" => 1,
                "job_title" => 4,
                "born_place" => "Solo",
                "born_date" => fake()->date("Y-m-d"),
            ],
            [
                "name" => "Admin Woyo",
                "nik" => "124abc",
                "gender" => 1,
                "password" => Hash::make("password"),
                "is_admin" => 1,
                "job_title" => 3,
                "born_place" => "Jakarta",
                "born_date" => fake()->date("Y-m-d"),
            ],
            [
                "name" => "Eka Candra",
                "nik" => "125abc",
                "gender" => 1,
                "password" => Hash::make("password"),
                "is_admin" => 0,
                "born_place" => "Bandung",
                "born_date" => fake()->date("Y-m-d"),
            ]
        ];
    }

    public function definition(): array
    {

        $user = $this->values[$this->index];
        $this->index = ($this->index + 1) % count($this->values);
        return $user;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

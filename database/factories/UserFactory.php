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
                "name" => "SPV Alex",
                "nik" => "admin01",
                "gender" => 0,
                "password" => Hash::make("password"),
                "is_admin" => 1,
                "job_title_id" => 4,
                "born_place" => "Jakarta",
                "born_date" => fake()->date("Y-m-d"),
            ],
            [
                "name" => "Lead Beatrix",
                "nik" => "admin02",
                "gender" => 0,
                "password" => Hash::make("password"),
                "is_admin" => 1,
                "job_title_id" => 3,
                "born_place" => "Jakarta",
                "born_date" => fake()->date("Y-m-d"),
            ],
            [
                "name" => "Employe Link",
                "nik" => "employe01",
                "gender" => 1,
                "password" => Hash::make("password"),
                "is_admin" => 0,
                "job_title_id" => 2,
                "born_place" => "Jakarta",
                "born_date" => fake()->date("Y-m-d"),
            ],
            [
                "name" => "Employe Layla",
                "nik" => "employe02",
                "gender" => 1,
                "password" => Hash::make("password"),
                "is_admin" => 0,
                "job_title_id" => 1,
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

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
                "name" => "Admin Mimin",
                "nik" => "123abc",
                "password" => Hash::make("password"),
                "is_admin" => 1,
                "remember_token" => Str::random(10)
            ],
            [
                "name" => "Eka Candra",
                "nik" => "124abc",
                "password" => Hash::make("password"),
                "is_admin" => 0,
                "remember_token" => Str::random(10)
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

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobTitle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskStatus>
 */
class JobTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = JobTitle::class;

    private $statusValues = ['Junior Operator', "Senior Operator", 'Leader', 'Supervisor'];
    private $statusIndex = 0;

    public function definition(): array
    {
        $status = $this->statusValues[$this->statusIndex];
        $this->statusIndex = ($this->statusIndex + 1) % count($this->statusValues);

        return [
            'name' => $status
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TaskStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskStatus>
 */
class TaskStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TaskStatus::class;

    private $statusValues = ['todo', 'doing', 'done'];
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

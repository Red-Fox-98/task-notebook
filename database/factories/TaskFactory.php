<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        $date = $this->faker->date() . 'T' . $this->faker->time();

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'due_date' => $date,
            'create_date' => $date,
            'priority' => $this->faker->randomElement(['низкий', 'средний', 'высокий']),
            'category' => $this->faker->randomElement(['Работа', 'Дом', 'Личное']),
            'status' => $this->faker->randomElement(['выполнена', 'не выполнена']),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTest extends TestCase
{
    use WithFaker;

    public function testUpdateTaskIsSuccessful(): void
    {
        $date = $this->faker->date() . 'T' . $this->faker->time();
        $taskId = Task::all()->random();
        $task = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'due_date' => $date,
            'create_date' => $date,
            'priority' => $this->faker->randomElement(['низкий', 'средний', 'высокий']),
            'category' => $this->faker->randomElement(['Работа', 'Дом', 'Личное']),
            'status' => $this->faker->randomElement(['выполнена', 'не выполнена']),
        ];

        $response = $this->json('POST', "/api/tasks/$taskId->id", $task);

        $response->assertStatus(200)->assertJsonStructure(['message']);
    }
}

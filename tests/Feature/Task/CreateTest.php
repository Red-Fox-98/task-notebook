<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use WithFaker;

    public function testCreateTestIsSuccessful(): void
    {
        $date = $this->faker->date() . 'T' . $this->faker->time();
        $task = [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'due_date' => $date,
            'create_date' => $date,
            'priority' => $this->faker->randomElement(['низкий', 'средний', 'высокий']),
            'category' => $this->faker->randomElement(['Работа', 'Дом', 'Личное']),
            'status' => $this->faker->randomElement(['выполнена', 'не выполнена']),
        ];

        $response = $this->json('POST', '/api/tasks', $task);

        $response->assertStatus(200)->assertJsonStructure(['id', 'message']);

        $this->assertDatabaseHas('tasks', ['title' => $task['title']]);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Feature\Task;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use WithFaker;

    public function testIndexTaskIsSuccessful(): void
    {
        $perPage = rand(5, 10);
        $page = rand(1, 3);
        $sort = $this->faker->randomElement(['due_date', 'created_at']);

        $response = $this->json(
            'GET',
            '/api/tasks',
            [
                'perPage' => $perPage,
                'page' => $page,
                'sort' => $sort,
            ]
        );

        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'due_date',
                    'create_date',
                    'priority',
                    'category',
                    'status'],
            ],
        ]);
    }
}

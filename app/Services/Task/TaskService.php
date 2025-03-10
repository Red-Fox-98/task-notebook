<?php

declare(strict_types=1);

namespace App\Services\Task;

use App\Data\Task\CreateRequestData;
use App\Data\Task\IndexRequestData;
use App\Data\Task\UpdateRequestData;
use App\Models\Task;

class TaskService
{
    final public function create(CreateRequestData $request): Task
    {
        return Task::query()->create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->dueDate,
                'create_date' => $request->createDate,
                'priority' => $request->priority,
                'category' => $request->category,
                'status' => $request->status,
            ]
        );
    }

    final public function index(IndexRequestData $request): array
    {
        $search = '%' . $request->search . '%';

        return Task::query()->where('title', 'LIKE', $search)
            ->orderByDesc($request->sort)
            ->paginate($request->perPage ?? config('app.pagination.perPage'))
            ->items();
    }

    final public function show(int $id): ?Task
    {
        /** @var Task $task */
        $task = Task::query()->findOrFail($id);

        return $task;
    }

    final public function update(int $id, UpdateRequestData $request): ?Task
    {
        /** @var Task $task */
        $task = Task::query()->find($id);

        $task->update([
            'title' => $request->title ?: $task['title'],
            'description' => $request->description ?: $task['description'],
            'due_date' => $request->dueDate ?: $task['due_date'],
            'create_date' => $request->createDate ?: $task['create_date'],
            'priority' => $request->priority ?: $task['priority'],
            'category' => $request->category ?: $task['category'],
            'status' => $request->status ?: $task['status'],
        ]);

        return $task;
    }

    final public function delete(int $id): void
    {
        Task::query()->find($id)->delete();
    }
}

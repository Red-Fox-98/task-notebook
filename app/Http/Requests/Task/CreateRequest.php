<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Data\Task\CreateRequestData;
use App\Enums\TaskCategoryEnum;
use App\Enums\TaskPriorityEnum;
use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [ 'string' ],
            'description' => [ 'string' ],
            'due_date' => [ 'date' ],
            'create_date' => [ 'date' ],
            'priority' => [ 'string', new Enum(TaskPriorityEnum::class) ],
            'category' => [ 'string', new Enum(TaskCategoryEnum::class) ],
            'status' => [ 'string', new Enum(TaskStatusEnum::class) ],
        ];
    }

    public function getData(): CreateRequestData
    {
        return CreateRequestData::from($this->validated());
    }
}

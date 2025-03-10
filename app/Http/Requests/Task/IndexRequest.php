<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Data\Task\IndexRequestData;
use App\Enums\TaskSortEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => [ 'string' ],
            'sort' => [ 'string', new Enum(TaskSortEnum::class) ],
        ];
    }

    public function getData(): IndexRequestData
    {
        return IndexRequestData::from($this->validated());
    }
}

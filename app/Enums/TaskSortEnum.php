<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskSortEnum: string
{
    case dueDate = 'due_date';
    case createdAt = 'created_at';
}

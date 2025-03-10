<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskPriorityEnum: string
{
    case High = 'высокий';
    case Medium = 'средний';
    case Low = 'низкий';
}

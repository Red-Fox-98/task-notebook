<?php

declare(strict_types=1);

namespace App\Enums;

enum TaskCategoryEnum: string
{
    case Work = 'Работа';
    case Home = 'Дом';
    case Personal = 'Личное';
}

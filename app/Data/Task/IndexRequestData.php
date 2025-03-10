<?php

declare(strict_types=1);

namespace App\Data\Task;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class IndexRequestData extends Data
{
    public function __construct(
        public ?int $perPage,
        public ?string $search,
        public ?string $sort,
    ) {
    }
}

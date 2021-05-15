<?php

declare(strict_types = 1);

use function Minibase\partition;

it('partitions a list', function (): void {
    $range = range(0, 7);
    $half = count($range) / 2;
    [$pass, $fail] = partition($range, function ($value): bool {
        return 0 === $value % 2;
    });

    expect($pass)
        ->toHaveCount($half)
        ->and($fail)
        ->toHaveCount($half)
        ->and(array_sum($pass + $fail))
        ->toBe(array_sum($range));
})->only();

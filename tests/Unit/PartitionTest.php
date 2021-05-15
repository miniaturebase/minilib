<?php

declare(strict_types = 1);

/**
 * This file is part of the minibase-app/minilib PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
});

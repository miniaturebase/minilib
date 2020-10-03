<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use Exception;

use function Phelpers\retry;

it('retries', function (): void {
    $actual = 0;
    $expected = 10;

    retry($expected, function () use (&$actual, $expected) {
        $actual++;

        if ($actual < $expected) {
            throw new Exception;
        }
    });

    expect($actual)->toBe($expected);
});

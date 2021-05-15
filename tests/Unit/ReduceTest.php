<?php

declare(strict_types = 1);

use function Minibase\array_make;
use function Minibase\reduce;
use function Minibase\str_random;

it('reduces lists to single values', function (): void {
    $strings = array_make(rand(1, 6), function (): string {
        return str_random(rand(4, 8));
    });

    expect(reduce($strings, function (string $accumulator, string $item): string {
        return $accumulator .= $item;
    }, ''))->toBe(implode('', $strings));
});

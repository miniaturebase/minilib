<?php

declare(strict_types = 1);

use function Phelpers\array_make;
use function Phelpers\head;
use function Phelpers\random_float;
use function Phelpers\str_random;

it('gets the first element', function ($expected, array $list): void {
    expect(head($list))->toBe($expected);
})->with(static function (): Generator {
    $int = rand(PHP_INT_MIN, PHP_INT_MAX);
    
    yield from [
        'empty' => [null, []],
        'integer' => [$int, [$int, random_float(0, 1, 5), rand(), str_random(), array_make(rand(2, 4))]],
    ];
});

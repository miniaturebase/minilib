<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use OutOfRangeException;
use TypeError;

use function Phelpers\pluck;
use function Phelpers\str_random;

it('plucks')
    ->expect(pluck([['foo' => 'bar'], ['foo' => null]], 'foo'))
    ->toBe(['bar', null]);

it('throws errors when collection contains not iterable item', function (): void {
    pluck(["", 1, null, true], str_random(8));
})->throws(TypeError::class);

it('throws errors when item does not contain key to pluck', function (): void {
    pluck([[]], str_random(8));
})->throws(OutOfRangeException::class);
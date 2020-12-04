<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2020 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers\Tests\Unit;

use OutOfRangeException;
use function Phelpers\pluck;

use function Phelpers\str_random;
use TypeError;

it('plucks')
    ->expect(pluck([['foo' => 'bar'], ['foo' => null]], 'foo'))
    ->toBe(['bar', null]);

it('throws errors when collection contains not iterable item', function (): void {
    pluck(["", 1, null, true], str_random(8));
})->throws(TypeError::class);

it('throws errors when item does not contain key to pluck', function (): void {
    pluck([[]], str_random(8));
})->throws(OutOfRangeException::class);

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers\Tests\Unit;

use function Phelpers\value;

it('evaluates variables', function ($value): void {
    expect(value($value))
        ->toEqual($value)
        ->toBe($value);
})->with('random');

it('evaluates closures', function ($value): void {
    $closure = static function () use ($value) {
        return $value;
    };

    expect(value($closure))
        ->toEqual($value)
        ->toBe($value);
})->with('random');

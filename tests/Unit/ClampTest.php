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

use function Minibase\clamp;
use function Minibase\random_float;

it('clamps a number between an upper and lower bounds', function ($subject, $min, $max): void {
    expect(clamp($subject, $min, $max))
        ->toBeNumeric()
        ->toBeLessThanOrEqual($max)
        ->toBeGreaterThanOrEqual($min);
})->with([
    'never exceeds 10 or proceeds 1' => [rand(), 1, 10],
    'works with negative numbers'    => [rand(PHP_INT_MIN, -1), 1, 10],
    'floating point precision'       => [random_float(0, 1, 3), 0.51, 0.53],
]);

it('swaps input if min is greater than max')
    ->expect(clamp(rand(), 1000, 1))
    ->toBeLessThanOrEqual(1000)
    ->toBeGreaterThanOrEqual(1);

it('throws errors for non-numeric input', function ($subject, $min, $max): void {
    clamp($subject, $min, $max);
})->throws(InvalidArgumentException::class)->with([
    [[], [], []],
]);

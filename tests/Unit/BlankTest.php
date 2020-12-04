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

use function Phelpers\array_make;
use function Phelpers\blank;
use function Phelpers\random_float;
use function Phelpers\str_random;

it('returns boolean values only', function ($subject): void {
    expect(blank($subject))->toBeBool();
})->with('random');

it('can detect blank values', function ($subject): void {
    expect(blank($subject))->toBeTrue();
})->with([
    'null'                   => [null],
    'empty string'           => [''],
    'many space characters'  => ['           '],
    'white space characters' => ["\n\t\r     \t \n"],
    'empty array'            => [[]],
]);

it('can detect non-blank values', function ($subject): void {
    expect(blank($subject))->toBeFalse();
})->with([
    'boolean (true)'                            => [true],
    'boolean (false)'                           => [false],
    'zero'                                      => 0,
    'integer'                                   => rand(PHP_INT_MIN, PHP_INT_MAX),
    'float'                                     => random_float(0, 1, rand(2, 10)),
    'string'                                    => [str_random(rand(1, 8))],
    'many space characters around 1 character'  => ['      a     '],
    'white space characters around 1 character' => ["\n\t\r    1   \t \n"],
    'array with n elements'                     => [array_make(rand(1, 5))],
    'object'                                    => [new stdClass()],
    'resource'                                  => [fopen('php://temp', 'r')],
]);

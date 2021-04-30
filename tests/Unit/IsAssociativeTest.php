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

namespace Minibase\Tests\Unit;

use function Minibase\is_associative;

it('detects indexed arrays', function (array $array): void {
    expect(is_associative($array))->toBeFalse();
})->with([
    'empty array'  => [[]],
    'list (array)' => [range(0, rand(1, 24))],
]);

it('detects associative arrays', function (array $array): void {
    expect(is_associative($array))->toBeTrue();
})->with([
    'map of strings to values'  => [['sup' => 'dawg']],
    'map of integers to values' => [[1 => 'hello world!']],
]);

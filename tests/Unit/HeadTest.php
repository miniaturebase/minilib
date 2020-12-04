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
use function Phelpers\head;
use function Phelpers\random_float;
use function Phelpers\str_random;

it('gets the first element', function ($expected, array $list): void {
    expect(head($list))->toBe($expected);
})->with(static function (): Generator {
    $int = rand(PHP_INT_MIN, PHP_INT_MAX);

    yield from [
        'empty'   => [null, []],
        'integer' => [$int, [$int, random_float(0, 1, 5), rand(), str_random(), array_make(rand(2, 4))]],
    ];
});

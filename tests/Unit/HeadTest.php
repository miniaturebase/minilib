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

use function Minibase\array_make;
use function Minibase\head;
use function Minibase\random_float;
use function Minibase\str_random;

it('gets the first element', function ($expected, array $list): void {
    expect(head($list))->toBe($expected);
})->with(static function (): Generator {
    $int = rand(PHP_INT_MIN, PHP_INT_MAX);

    yield from [
        'empty'   => [null, []],
        'integer' => [$int, [$int, random_float(0, 1, 5), rand(), str_random(), array_make(rand(2, 4))]],
    ];
});

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

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

use function Phelpers\swap;

it('swaps variable values', function (): void {
    $foo = true;
    $bar = false;

    swap($foo, $bar);
    expect($foo)
        ->toBeFalse()
        ->and($bar)
        ->toBeTrue();
    swap($foo, $bar);
    expect($foo)
        ->toBeTrue()
        ->and($bar)
        ->toBeFalse();
});

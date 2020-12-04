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

namespace Phelpers;

/**
 * Generate a pseudo-random floating point number in a range
 *
 * @param int|float|string $min The absolute minimum value that can be produced
 * @param int|float|string $max The absolute maximum value that can be produced
 * @param int $precision
 * @return float
 * @see https://stackoverflow.com/a/32898214
 */
function random_float($min, $max, int $precision = null): float
{
    $result = $min + \lcg_value() * \abs($max - $min);

    if (null !== $precision) {
        return \round($result, $precision);
    }

    return $result;
}

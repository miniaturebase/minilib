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
 * Return the amount of bits in a given set of bytes.
 *
 * @param int $bytes
 * @return int
 * @see https://stackoverflow.com/a/16849014
 */
function bits(int $bytes): int
{
    $count = 0;

    while ($bytes) {
        $count += ($bytes & 1);
        $bytes = $bytes >> 1;
    }

    return $count;
}

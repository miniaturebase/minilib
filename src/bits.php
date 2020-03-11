<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Return the amount of bits in a given set of bytes.
 *
 * @param int $bytes
 * @return int
 * @see https://stackoverflow.com/a/16849014
 */
function bits(int $bytes): int {
    $count = 0;

    while ($bytes) {
        $count += ($bytes & 1);
        $bytes = $bytes >> 1;
    }

    return $count;
}

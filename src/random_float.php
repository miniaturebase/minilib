<?php

declare(strict_types = 1);

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
function random_float($min, $max, int $precision = null): float {
    $result = $min + lcg_value() * abs($max - $min);

    if (null !== $precision) {
        return round($result, $precision);
    }

    return $result;
}

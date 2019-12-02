<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Determine if a numeric value is within range
 *
 * @return bool
 */
function between($subject, $min, $max): bool {
    if (!is_numeric($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type numeric, %s given', __FUNCTION__, gettype($subject)));
    }
    
    return $subject >= $min and $subject <= $max;
}
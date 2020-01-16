<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Determine if a numeric value is within range.
 *
 * @param int|float|string $subject A numeric value to be compared 
 * @param int|float|string $min The floor of the range to compare the subject against
 * @param int|float|string $max The ceiling of the range to compare the subject against
 * @return bool
 */
function between($subject, $min, $max): bool {
    if (!\is_numeric($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($subject)));
    }

    if (!\is_numeric($min)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($min)));
    }

    if (!\is_numeric($max)) {
        throw new InvalidArgumentException(\sprintf('Argument 3 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($max)));
    }
    
    return $min <= $subject and $subject <= $max;
}
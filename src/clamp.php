<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Clamp (bound) a given number between two other given numbers acting as an
 * upper and lower boounds.
 *
 * @param int|float|string $subject The value to be clamped
 * @param int|float|string $min The lower bounds to clamp to
 * @param int|float|string $max The upper bounds to clamp to
 * @return int|float|string
 */
function clamp($subject, $min, $max) {
    if (!is_numeric($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|float|string', \gettype($subject)));
    }
    
    if (!is_numeric($min)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|float|string', \gettype($subject)));
    }
    
    if (!is_numeric($max)) {
        throw new InvalidArgumentException(\sprintf('Argument 3 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|float|string', \gettype($subject)));
    }
    
    return \min(\max($subject, $min), $max);
}
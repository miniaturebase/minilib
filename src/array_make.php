<?php

declare(strict_types = 1);

namespace Phelpers;

use Closure;
use InvalidArgumentException;

/**
 * Fill an array with a number of items equal to the result of the closure; something
 * like an `array_map` mixed with `array_fill`. The closure will receive the result
 * of the last iteration as it's first parameter. You can also pass an array of
 * values that will be passed to the closure, instead of just the number of items.
 *
 * @param int|array $indices How many items to populate the array with.
 * @param Closure $closure The closure that will be called to generate a value
 * @return array
 */
function array_make($indices = 0, Closure $closure = null): array {
    $isInt = \is_int($indices);
    
    if (!$isInt and !\is_array($indices)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|array', \gettype($indices)));
    }
    
    if (!$indices) {
        return [];
    }

    $items = [];
    
    if ($isInt) {
        $indices = \range(0, \max($indices - 1, 0));

        foreach ($indices as $index) {
            $items[] = with(tail($items) ?? 0, $closure);
        }
    } else {
        foreach ($indices as $index => $value) {
            $items[] = with($value, $closure);
        }
    }

    return $items;
}
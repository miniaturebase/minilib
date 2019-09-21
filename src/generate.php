<?php

declare(strict_types = 1);

namespace Phelpers;

use Closure;
use InvalidArgumentException;

function generate($indices = 0, Closure $closure = null) {
    $isInt = \is_int($indices);
    
    if (!$isInt and !\is_array($indices)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|array', gettype($indices)));
    }
    
    if (!$indices) {
        return [];
    }

    if ($isInt) {
        $indices = range(0, max($indices - 1, 0));
        $items = [];

        foreach ($indices as $index) {
            yield $items[] = with(tail($items) ?? 0, $closure);
        }
    } else {
        foreach ($indices as $index => $value) {
            yield with($value, $closure);
        }
    }
}
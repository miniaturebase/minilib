<?php

declare(strict_types = 1);

namespace Phelpers;

use Closure;
use InvalidArgumentException;

function generate($indices = 0, Closure $closure = null) {
    $type = gettype($indices);
    
    if (!in_array($type, ['integer', 'array'])) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type int|array, %s given', __FUNCTION__, $type));
    }
    
    if (!$indices) {
        return [];
    }

    if ('integer' == $type) {
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
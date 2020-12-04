<?php

declare(strict_types = 1);

namespace Phelpers;

use OutOfRangeException;
use TypeError;

function pluck(iterable $subject, string $path, ?string $key = null)
{
    $function = __FUNCTION__;
    $invariant = static function ($item, $index) use ($function): void {
        if (!\is_object($item) and !\is_array($item)) {
            throw new TypeError(\sprintf('Argument 1 passed to %s() must be of the type %s, %s given at index %d', $function, 'iterable<array|object>', \gettype($item), $index));
        }
    };
    
    if (blank($key)) {
        return map($subject, static function ($item, $index) use ($path, $invariant) {
            $invariant($item, $index);

            if (!exists($item, $path)) {
                throw new OutOfRangeException(\sprintf('Item at index %d does not contain the path %s', $index, $path));
            }
            
            return read($item, $path);
        });
    }

    $plucked = [];
    
    foreach ($subject as $index => $item) {
        $invariant($item, $index);

        $plucked[read($item, $key)] = read($item, $path);
    }

    return $plucked;
}

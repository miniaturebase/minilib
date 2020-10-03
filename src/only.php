<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Return a new array containing only the specified key/keys.
 *
 * @param array|object $array The array to extract keys and their values from.
 * @param string|array<string> $keys A singular key or an array of keys to create a new array from the given array.
 * @return array
 */
function only($subject, $keys) {
    $isObject = \is_object($subject);
    
    if (!\is_array($subject) and !$isObject) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|object', \gettype($subject)));
    }
    
    $new = ($isObject) ? (object) [] : [];

    foreach (wrap($keys) as $index => $path) {
        if (!\is_string($path)) {
            throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, array<%s> given at index %d', __FUNCTION__, 'array<string>', \gettype($path), $index));
        }
        
        $noop = md5(str_random() . sprintf('%s.%d', $path, $index));
        $value = get($subject, $path, $noop);

        if ($noop === $value) {
            continue;
        }
        
        put($new, $path, $value);
    }

    return $new;
}
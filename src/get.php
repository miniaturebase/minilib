<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Return the value from a given subject by the given key. Provide a fallback
 * value optionally. Useful for when dealing with an array or object, and unsure
 * which it could be.
 *
 * @param array|object $subject The subject to get a value from by a given key/property name
 * @param string $key The index, key or property name to get a value by
 * @param mixed $default A fallback value to provide if things don't go your way
 * @return mixed
 */
function get($subject, string $key, $default = null) {
    $isObject = \is_object($subject);
    
    if (!$isObject and !\is_array($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|object', \gettype($subject)));
    }
    
    if ($isObject) {
        return $subject->{$key} ?? $default;
    }
    
    return $subject[$key] ?? $default;
}
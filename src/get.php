<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Return the value from a given subject by the given key or "path" using dot
 * notation. Provide a fallback value optionally. Useful for when dealing with
 * an array or object, and unsure which it could be.
 *
 * @param array|object $subject The subject to get a value from by a given key/property name
 * @param string $path The index, key, property, or dot separated path name to get a value at
 * @param mixed $default A fallback value to provide if things don't go your way
 * @return mixed
 */
function get($subject, string $path, $default = null) {
    $isArray = \is_array($subject);
    $isObject = \is_object($subject);
    
    if (!$isObject and !$isArray) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|object', \gettype($subject)));
    }
    
    if ($isArray and \array_key_exists($path, $subject)) {
        return $subject[$path];
    }
    
    if ($isObject and \property_exists($subject, $path)) {
        return $subject->{$path};
    }
    
    foreach (\explode(".", $path) as $segment) {
        $isArray = \is_array($subject);
        $isObject = \is_object($subject);
        
        if (!$isArray and !$isObject) {
            continue;
        }
    
        if (($isArray and !\array_key_exists($segment, $subject))
            or ($isObject and !\property_exists($subject, $segment))
        ) {
            $subject = value($default);

            continue;
        }

        if ($isArray) {
            $subject = $subject[$segment];
        } else {
            $subject = $subject->{$segment};
        }
    }
    
    return $subject;
}

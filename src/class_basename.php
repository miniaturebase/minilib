<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Return the base name of a given FQCN string, without the namespace.
 *
 * @param string|object $class The FQCN string or instance of an object.
 * @param string $delimiter The delimiter that sits between each namespace segment.
 * @return string
 */
function class_basename($class, string $delimiter = '\\'): string {
    $isObject = \is_object($class);

    if (!$isObject and !\is_string($class)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'string|object', \gettype($class)));
    }

    if (!$isObject and blank($class)) {
        return '';
    }
    
    return tail(\array_filter(
        \explode($delimiter, ($isObject) ? \get_class($class) : $class),
    ));
}

<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Prepend an item onto a given subject.
 *
 * @param mixed $head
 * @param array|string|int|float $subject
 * @param string $delimiter
 * @return array|string
 */
function prepend($head, $subject, string $delimiter = '') {
    $isStringable = function ($subject): bool {
        return \is_string($subject)
            or \is_numeric($subject)
            or (\is_object($subject) and \method_exists($subject, '__toString'));
    };
    
    if ($isStringable($subject) and !$isStringable($head)) {
        throw new InvalidArgumentException(\sprintf('Arguments 1 and 2 passed to %s must be of the type %s, %s|%s given', __FUNCTION__, 'string', \gettype($head), \gettype($subject)));
    } else if (!\is_array($subject) and !$isStringable($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array', \gettype($subject)));
    }

    if (\is_array($subject)) {
        \array_unshift($subject, $head);

        return $subject;
    }
    
    return $head.$delimiter.$subject;
}
<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Prepend an item onto a given subject.
 *
 * @param mixed $head
 * @param array|string $subject
 * @param string $delimiter
 * @return array|string
 */
function prepend($head, $subject, string $delimiter = '') {
    if (\is_string($subject) and !(\is_string($head) or \is_numeric($head))) {
        throw new InvalidArgumentException(\sprintf('Arguments 1 and 2 passed to %s must be of the type %s, %s|%s given', __FUNCTION__, 'string', \gettype($head), \gettype($subject)));
    } else if (!\is_array($subject) and !\is_string($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array', \gettype($subject)));
    }

    if (\is_array($subject)) {
        \array_unshift($subject, $head);

        return $subject;
    }
    
    return $subject.$delimiter.$tail;
}
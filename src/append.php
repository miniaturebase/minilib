<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Append an item to a given subject.
 *
 * @param mixed $tail
 * @param array|string $subject
 * @param string $delimiter
 * @return array|string
 */
function append($tail, $subject, string $delimiter = '') {
    if (\is_string($subject) and !(\is_string($tail) or \is_numeric($tail))) {
        throw new InvalidArgumentException(\sprintf('Arguments 1 and 2 passed to %s must be of the type %s, %s|%s given', __FUNCTION__, 'string', \gettype($tail), \gettype($subject)));
    } else if (!\is_array($subject) and !\is_string($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array', \gettype($subject)));
    }

    if (\is_array($subject)) {
        $subject[] = $tail;

        return $subject;
    }

    return $subject.$delimiter.$tail;
}
<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Append an item to a given subject.
 *
 * @param array|string $tail
 * @param array|string $subject
 * @param string $delimiter
 * @return array|string
 */
function append($tail, $subject, string $delimiter = '') {
    if (empty($tail)) {
        return $subject;
    }
    
    if (\is_array($subject)) {
        $subject[] = $tail;

        return $subject;
    }
    
    if (\is_string($tail) and (\is_string($subject) or \is_numeric($subject))) {
        return $subject.$delimiter.$tail;
    }
}
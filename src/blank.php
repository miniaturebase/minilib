<?php

declare(strict_types = 1);

namespace Helpers;

use Countable;

/**
 * Determine if the givenn value is "blank" (essentially `empty` on steroids).
 *
 * @param mixed $subject The subject to inspect for "blank-ness".
 * @return boolean
 */
function blank($subject): bool {
    if (\is_null($subject)) {
        return true;
    }

    if (\is_string($subject)) {
        return empty(\trim($subject));
    }
    
    if (\is_numeric($subject) or \is_bool($subject)) {
        return false;
    }
    
    if ($subject instanceof Countable) {
        return (bool) \count($subject);
    }

    return empty($subject);
}
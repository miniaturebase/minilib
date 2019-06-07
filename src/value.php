<?php

declare(strict_types = 1);

namespace Helpers;

use Closure;

/**
 * Evaluate the given subject's value and return it.
 * Useful for resoling default values.
 *
 * @param mixed $subject The subject to evaluate and/or return.
 * @return mixed
 */
function value($subject) {
    return ($subject instanceof Closure) ? $subject() : $subject;
}
<?php

declare(strict_types = 1);

namespace Helpers;

use Closure;

/**
 * Execute the provided callback on the given subject, and return the subject
 * (the return value of the closure is irrelevant).
 *
 * @param mixed $subject The subject to pass to the given closure.
 * @param Closure $closure The closure that will receive the subject to process.
 * @return mixed
 */
function tap($subject, Closure $closure) {
    transform($subject, $closure);

    return $subject;
}

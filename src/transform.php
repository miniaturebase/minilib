<?php

declare(strict_types = 1);

namespace Helpers;

use Closure;

/**
 * Execute the given callback on the given subject, and return the result.
 *
 * @param mixed $subject The subject to pass to the given closure.
 * @param Closure $closure The closure that will receive the subject to process.
 * @return mixed
 */
function transform($subject, Closure $closure) {
    return with($subject, $closure);
}
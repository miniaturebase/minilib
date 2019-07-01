<?php

declare(strict_types = 1);

namespace Phelpers;

use Closure;

/**
 * Simply returns the given subject. If the optional closure is provided, the
 * subject will be passed to it and the result of the closure will be returned.
 *
 * @param mixed $subject The value to return or pass to the optional closure.
 * @param Closure $closure An optional closure that receives the subject to process.
 * @return mixed
 */
function with($subject, Closure $closure = null) {
    return ($closure) ? $closure($subject) : $subject;
}

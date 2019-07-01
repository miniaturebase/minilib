<?php

declare(strict_types = 1);

namespace Phelpers;

use Closure;
use Throwable;

/**
 * Retry the provided closure equal to times given, and wait for the interval
 * between each try. Any exceptions or errors thrown in each try will be
 * swallowed, except for exceptions caught on attempts greater than the times.
 * 
 * @see https://github.com/igorw/retry/issues/3
 *
 * @param integer $times The amount of times to execute the closure.
 * @param Closure $closure The closure to retry failed executions for.
 * @param integer $interval The amount of time **in seconds** to wait after each failed try.
 * @return mixed
 */
function retry(int $times, Closure $closure, int $interval = 0) {
    $times--;

    beginning:
    
    try {
        return $closure();
    } catch (Throwable $exception) {
        if (!$times) {
            throw $exception;
        }

        if ($interval) {
            \sleep($interval);
        }

        $times--;
        
        goto beginning;
    }
}

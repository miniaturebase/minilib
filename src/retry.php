<?php

declare(strict_types = 1);

namespace Helpers;

use Closure;
use Throwable;

/**
 * Retry the provided closure equal to times given, and wait for the interval
 * between each try. Any exceptions or errors thrown in each try will be
 * swallowed, except for exceptions caught on attempts greater than the times.
 *
 * @param integer $times The amount of times to execute the closure.
 * @param integer $interval The amount of time **in seconds** to wait after each failed try.
 * @param Closure $closure The closure to retry failed executions for.
 * @return mixed
 */
function retry(int $times, int $interval, Closure $closure) {
    for ($i = 1; /* condition in catch */; $i++) {
        try {
            return with($i, $closure);
        } catch (Throwable $e) {
            if ($i >= $times) throw $e;
            sleep($interval);
        }
    }
}
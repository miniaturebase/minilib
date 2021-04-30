<?php

declare(strict_types = 1);

/**
 * This file is part of the minibase-app/minilib PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Minibase;

use Closure;
use Throwable;

/**
 * Retry the provided closure equal to times given, and wait for the interval
 * between each try. Any exceptions or errors thrown in each try will be
 * swallowed, except for exceptions caught on attempts greater than the times.
 *
 * @param integer $times The amount of times to execute the closure.
 * @param Closure $closure The closure to retry failed executions for.
 * @param integer $interval The amount of time **in seconds** to wait after each failed try.
 * @return mixed
 * @see https://github.com/igorw/retry/issues/3
 */
function retry(int $times, Closure $closure, int $interval = 0)
{
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

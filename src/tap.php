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

/**
 * Execute the provided callback on the given subject, and return the subject
 * (the return value of the closure is irrelevant).
 *
 * @param mixed $subject The subject to pass to the given closure.
 * @param Closure $closure The closure that will receive the subject to process.
 * @return mixed
 */
function tap($subject, Closure $closure)
{
    transform($subject, $closure);

    return $subject;
}

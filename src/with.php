<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
function with($subject, Closure $closure = null)
{
    return ($closure) ? $closure($subject) : $subject;
}

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2020 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

use Closure;

/**
 * Return a partial closure from the given callable and arguemnts. The closure
 * will accept all remaining arguments of the original callable.
 *
 * @param callable $function The callable to create a partial from
 * @param mixed ...$arguments A list of arguments to supply to the callable
 * @return Closure
 */
function partial(callable $function, ...$arguments): Closure
{
    return function (...$nextArguments) use ($function, $arguments) {
        return $function(...\array_merge($arguments, $nextArguments));
    };
}

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
 * Negate the given predicate.
 *
 * @param callable $subject Some closure to be negated
 * @return Closure
 */
function not(callable $subject): Closure
{
    return function (...$args) use ($subject) {
        return !value($subject(...$args));
    };
}

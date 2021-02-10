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
 * Evaluate the given subject's value and return it.
 * Useful for resoling default values.
 *
 * @param mixed $subject The subject to evaluate and/or return.
 * @return mixed
 */
function value($subject)
{
    return ($subject instanceof Closure) ? $subject() : $subject;
}

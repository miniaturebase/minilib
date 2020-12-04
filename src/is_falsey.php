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

/**
 * Determine if the given value is one of a falsey.
 *
 * @param mixed $value The value to test for falsey-ness.
 * @return bool
 */
function is_falsey($value): bool
{
    return !is_truthy($value);
}

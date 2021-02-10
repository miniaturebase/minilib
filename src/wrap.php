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

/**
 * Wrap a given value in an array if it is not already one.
 *
 * @param mixed $subject The subject value to be wrapped with an array.
 * @return array
 */
function wrap($subject): array
{
    if (\is_null($subject)) {
        return [];
    }

    return (\is_array($subject)) ? $subject : [$subject];
}

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

/**
 * Determine if the given value is one of a truthy-ness.
 *
 * The following strings are considered to be "true":
 *
 * - `"true"`
 * - `"1"`
 * - `"yes"`
 * - `"on"`
 * - `"enabled"`
 * - `"active"`
 *
 * @param mixed $value The value to test for truthy-ness.
 * @return bool
 */
function is_truthy($value): bool
{
    if (\is_numeric($value)) {
        return $value > 0;
    }

    $notBlank = !blank($value);

    if (\is_string($value) and $notBlank) {
        return \in_array(
            \strtolower(\trim($value)),
            ['true', '1', 'yes', 'on', 'enabled', 'active'],
            true,
        );
    }

    return $notBlank and false !== (bool) $value;
}

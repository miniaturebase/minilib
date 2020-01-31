<?php

declare(strict_types = 1);

namespace Phelpers;

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
function is_truthy($value): bool {
    if (\is_numeric($value)) {
        return $value > 0;
    }

    if (\is_string($value)) {
        return \in_array(
            \strtolower(\trim($value)),
            ['true', '1', 'yes', 'on', 'enabled', 'active'],
            true,
        );
    }

    return !blank($value) and false !== (bool) $value;
}

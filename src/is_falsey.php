<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Determine if the given value is one of a falsey.
 *
 * @param mixed $value The value to test for falsey-ness.
 * @return bool
 */
function is_falsey($value): bool {
    return !is_truthy($value);
}

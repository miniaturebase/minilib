<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Wrap a given value in an array if it is not already one.
 *
 * @param mixed $subject The subject value to be wrapped with an array.
 * @return array
 */
function wrap($subject): array {
    if (is_null($subject)) return [];

    return (is_array($subject)) ? $subject : [$subject];
}
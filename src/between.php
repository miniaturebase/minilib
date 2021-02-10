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

use InvalidArgumentException;

/**
 * Determine if a numeric value is within range.
 *
 * @param int|float|string $subject A numeric value to be compared
 * @param int|float|string $min The floor of the range to compare the subject against
 * @param int|float|string $max The ceiling of the range to compare the subject against
 * @return bool
 */
function between($subject, $min, $max): bool
{
    if (!\is_numeric($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($subject)));
    }

    if (!\is_numeric($min)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($min)));
    }

    if (!\is_numeric($max)) {
        throw new InvalidArgumentException(\sprintf('Argument 3 passed to %s must be of the type int|float|string, %s given', __FUNCTION__, \gettype($max)));
    }

    return $min <= $subject and $subject <= $max;
}

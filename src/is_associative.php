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
 * Try and determine if the given array is associative or indexed.
 *
 * **NOTE:** Empty arrays will return false, because they are technically neither
 * associative, _or_ indexed.
 *
 * @param array $array The array to check for associativeness.
 * @return bool
 * @see https://stackoverflow.com/a/173479
 */
function is_associative(array $array): bool
{
    return ([] === $array) ? false : \array_keys($array) !== \range(0, \count($array) - 1);
}

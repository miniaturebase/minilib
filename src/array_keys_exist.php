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
 * Checks if the given keys or indices exist in the given array.
 *
 * @param array $keys A list of keys/indices to search for
 * @param array $subject An indexed or associative array to be searched
 * @param int $minimum The minimum amount of matches required to pass the check (this value is capped at the length of `$keys`)
 * @return bool
 */
function array_keys_exist(array $keys, array $subject, int $minimum = 1): bool
{
    return \count(\array_intersect_key(\array_flip($keys), $subject)) >= \min($minimum, \count($keys));
}

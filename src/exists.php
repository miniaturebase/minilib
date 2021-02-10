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
 * Attempt to determine if the given array or object contains the given path (a
 * dot sperated path of keys/properties).
 *
 * @param array|object $subject The subject to look for the existence of a key on
 * @param string $path A key/property or dot seperated path of keys/properties to check for existence
 * @return bool
 */
function exists($subject, string $path): bool
{
    $noop = \md5(path([str_random(), $path, \rand()], '.'));

    return read($subject, $path, $noop) !== $noop;
}

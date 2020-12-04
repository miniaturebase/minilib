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

use TypeError;

/**
 * Return a new array containing only the specified key/keys.
 *
 * @param array|object $array The array to extract keys and their values from.
 * @param string|array<string> $keys A singular key or an array of keys to create a new array from the given array.
 * @return array
 */
function only($subject, $keys)
{
    $isObject = \is_object($subject);

    if (!\is_array($subject) and !$isObject) {
        throw new TypeError(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|object', \gettype($subject)));
    }

    $new = ($isObject) ? (object) [] : [];

    foreach (wrap($keys) as $index => $path) {
        if (!\is_string($path)) {
            throw new TypeError(\sprintf('Argument 2 passed to %s must be of the type %s, array<%s> given at index %d', __FUNCTION__, 'array<string>', \gettype($path), $index));
        }

        $value = read($subject, $path);

        if (\is_null($value) and !exists($subject, $path)) {
            continue;
        }

        write($new, $path, $value);
    }

    return $new;
}

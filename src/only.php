<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Return a new array containing only the specified key/keys.
 *
 * @param array $array The array to extract keys and their values from.
 * @param string|array $keys A singular key or an array of keys to create a new array from the given array.
 * @return array
 */
function only(array $array, $keys): array {
    $new = [];

    foreach (wrap($keys) as $key) {
        $new[$key] = $array[$key];
    }

    return $new;
}
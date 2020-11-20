<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Attempt to determine if the given array or object contains the given path (a
 * dot sperated path of keys/properties).
 *
 * @param array|object $subject The subject to look for the existence of a key on
 * @param string $path A key/property or dot seperated path of keys/properties to check for existence
 * @return bool
 */
function exists($subject, string $path): bool {
    $noop = \md5(path([str_random(), $path, \rand()], '.'));

    return read($subject, $path, $noop) !== $noop;
}

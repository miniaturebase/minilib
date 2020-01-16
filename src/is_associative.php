<?php

declare(strict_types = 1);

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
function is_associative(array $array): bool {
    return ([] === $array) ? false : \array_keys($array) !== \range(0, \count($array) - 1);
}
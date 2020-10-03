<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Zip all given arrays together as a single array containing an amount of arrays
 * equal to the longest subject's length.
 *
 * @param array ...$subjects A variadic set of arrays to zip together
 * @return array
 * @see https://stackoverflow.com/questions/2815162/is-there-a-php-function-like-pythons-zip
 */
function zip(array ...$subjects): array {
    return \array_slice(
        \array_map(null, ...$subjects),
        0,
        \min(\array_map(
            static function (array $x): int {
                return \count($x);
            },
            wrap($subjects),
        )),
    );
}

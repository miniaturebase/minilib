<?php

declare(strict_types = 1);

namespace Phelpers;

use Traversable;

/**
 * Return the first item in an array.
 *
 * @param array $items An array of associative or indexed items.
 * @return mixed
 */
function head(array $items) {
    return (!count($items)) ? null : array_values($items)[0] ?? null;
}
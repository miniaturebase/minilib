<?php

declare(strict_types = 1);

namespace Helpers;

/**
 * Return the last item of an array.
 *
 * @param array $items An array of items to get the last item from.
 * @return mixed
 */
function tail(array $items) {
    return head(array_slice($items, -1));
}
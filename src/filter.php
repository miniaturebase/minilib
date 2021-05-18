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
 * Apply the given closure to each item in a list, returning a new list
 * containing only items which returned truthy.
 *
 * @param iterable $iterable A list of items to be filtered
 * @param callable|null $closure A closure that is responsible for filtering the items
 * @return iterable
 */
function filter(iterable $iterable, ?callable $closure = null): iterable
{
    $new = [];
    $closure = $closure ?? static function ($item) {
        return $item;
    };

    foreach ($iterable as $index => $item) {
        if ($closure($item, $index, $iterable)) {
            $new[$index] = $item;
        }
    }

    return $new;
}

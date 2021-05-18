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
 * Apply the given closure to each item within an iterable list.
 *
 * @param iterable $iterable Some list to iterate over
 * @param callable $closure A closure which receives an item, it's index, and the list as it's arguments, and returns the new item value
 * @return array|iterable
 */
function map(iterable $iterable, callable $closure)
{
    $new = [];

    foreach ($iterable as $index => $item) {
        $new[$index] = $closure($item, $index, $iterable);
    }

    return $new;
}

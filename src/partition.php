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
 * Partition a list using the given closure as a predicate. The results are
 * returned as a tuple with items that passed the predicate on the left, and the
 * failed items on the right.
 *
 * @param iterable $iterable The list to be divded into
 * @param callable $closure Some predicate used to divide the list with
 * @return iterable<iterable>
 */
function partition(iterable $iterable, callable $closure): iterable
{
    return [filter($iterable, $closure), filter($iterable, not($closure))];
}

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

/**
 * Return the last item of an array.
 *
 * @param array $items An array of items to get the last item from.
 * @return mixed
 */
function tail(array $items)
{
    return head(\array_slice($items, -1));
}

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

/**
 * Return the first item in an array.
 *
 * @param array $items An array of associative or indexed items.
 * @return mixed
 */
function head(array $items)
{
    return (!\count($items)) ? null : \array_values($items)[0] ?? null;
}

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
 * Collapse a multi-dimensional array into a flat array with the keys being a
 * dot-separated path to the value.
 *
 * @param array $subject The array to collapse
 * @return array
 */
function collapse(array $subject): array
{
    $paths = [];

    foreach ($subject as $key => $data) {
        $path = $key;

        if (!\is_array($data)) {
            $paths[] = $path;
        } else {
            $children = map(collapse($data), static function ($segment) use ($path) {
                return append($segment, $path, '.');
            });

            \array_walk_recursive($children, static function ($child) use (&$paths) {
                $paths[] = $child;
            });
        }
    }

    return $paths;
}

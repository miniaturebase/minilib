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

use Closure;
use Generator;
use InvalidArgumentException;

/**
 * Create a generator for a number of indices given, each equal to the result of
 * the closure. The closure will receive the result of the last iteration as it's
 * first parameter. You can also pass an array of values as the indices, and each
 * one will be passed to the closure, instead of just the number of items.
 *
 * @param int|array $indices How many times or items to generate
 * @param Closure $closure The closure that will be called to generate a value
 * @return array
 */
function generate($indices = 0, Closure $closure = null): Generator
{
    $isInt = \is_int($indices);

    if (!$isInt and !\is_array($indices)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'int|array', \gettype($indices)));
    }

    if (!$indices) {
        return [];
    }

    if ($isInt) {
        $indices = \range(0, \max($indices - 1, 0));
        $items = [];

        foreach ($indices as $index) {
            yield $items[] = with(tail($items) ?? 0, $closure);
        }
    } else {
        foreach ($indices as $index => $value) {
            yield with($value, $closure);
        }
    }
}

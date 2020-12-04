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
 * Create a numeronym of the provided word(s).
 *
 * @param string $input A word or set of words
 * @param string $delimiter Detect multiple words split by the given character
 * @return string
 */
function numeronym(string $input, string $delimiter = ' '): string
{
    return \implode($delimiter, \array_map(function (string $word): string {
        $length = \strlen($word);

        return (!(blank($word) or $length <= 1))
            ? \strtolower(\sprintf('%s%d%s', $word[0], \abs($length - 2), $word[-1]))
            : $word;
    }, \explode($delimiter, $input)));
}

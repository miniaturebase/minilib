<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Create a numeronym of the provided word(s).
 *
 * @param string $input A word or set of words
 * @param string $delimiter Detect multiple words split by the given character
 * @return string
 */
function numeronym(string $input, string $delimiter = ' '): string {
    return \implode($delimiter, \array_map(function (string $word): string {
        $length = \strlen($word);
        
        return (!(blank($word) or $length <= 1))
            ? \strtolower(\sprintf('%s%d%s', $word[0], \abs($length - 2), $word[-1]))
            : $word;
    }, \explode($delimiter, $input)));
}

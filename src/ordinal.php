<?php

declare(strict_types = 1);

namespace Helpers;

/**
 * Return the ordinal version of a given integer, as a string.
 *
 * @param integer $int The integeter to convert o an ordinal.
 * @return string
 */
function ordinal(int $int): string {
    $th = 'th';
    $suffixes = [$th, 'st', 'nd', 'rd', $th, $th, $th, $th, $th, $th];
    $suffix = ((($int % 100) >= 11) and (($int % 100) <= 13)) ? $th : $suffixes[$int % 10];

    return append($suffix, $int);
}
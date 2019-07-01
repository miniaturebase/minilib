<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Transform a string's casing into _**kebab** case_.
 * 
 * @see https://en.wikipedia.org/wiki/Letter_case#Special_case_styles
 *
 * @param string $subject The string to transform casing.
 * @return string
 * @uses snake_case
 */
function kebab_case(string $subject): string {
    return snake_case($subject, '-');
}
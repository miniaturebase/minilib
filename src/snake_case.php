<?php

declare(strict_types = 1);

namespace Helpers;

/**
 * Transform a string's casing into _**snake** case_.
 * 
 * @see https://en.wikipedia.org/wiki/Letter_case#Special_case_styles
 *
 * @param string $subject The string to transform casing.
 * @return string
 */
function snake_case(string $subject, $delimiter = '_'): string {
    if (!\ctype_lower($subject)) {
        $subject = \preg_replace('/\s+/u', '', \ucwords($subject));
        $subject = \mb_strtolower(\preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $subject), 'UTF-8');
    }

    return $subject;
}
<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Transform a string's casing into _**camel** case_.
 *
 * @param string $subject The string to transform casing.
 * @return string
 * @uses pascal_case
 * @see https://en.wikipedia.org/wiki/Letter_case#Special_case_styles
 */
function camel_case(string $subject): string {
    return \lcfirst(pascal_case($subject));
}
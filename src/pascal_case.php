<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Transform a string's casing into _**pascal** case_.
 *
 * @param string $subject The string to transform casing.
 * @return string
 * @see https://en.wikipedia.org/wiki/Camel_case#Variations_and_synonyms
 */
function pascal_case(string $subject): string {
    return \str_replace(' ', '', \ucwords(\str_replace(['-', '_'], ' ', $subject)));
}
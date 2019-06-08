<?php

declare(strict_types = 1);

namespace Helpers;

/**
 * Transform a string's casing into _**pascal** case_.
 * 
 * @see https://en.wikipedia.org/wiki/Camel_case#Variations_and_synonyms
 *
 * @param string $subject The string to transform casing.
 * @return string
 */
function pascal_case(string $subject): string {
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $subject)));
}
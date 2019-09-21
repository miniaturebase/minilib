<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Return the base name of a given FQCN string, without the namespace.
 *
 * @param string $class The FQCN string to process.
 * @param string $delimiter The delimiter that sits between each namespace segment.
 * @return string
 */
function class_basename(string $class, string $delimiter = '\\'): string {
    return tail(explode($delimiter, $class));
}

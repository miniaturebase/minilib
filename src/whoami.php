<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Retrieves the current process owner's username.
 *
 * @return string|null
 */
function whoami(): ?string {
    return get(posix_getpwuid(posix_geteuid()), 'name');
}
<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Check if the current operating system is in the DOS/Windows family.
 *
 * @return bool
 */
function is_windows(): bool {
    return 'windows' === \strtolower(read(runtime('os'), 'os.name'));
}

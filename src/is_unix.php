<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Check if the current operating system is in the Unix family.
 *
 * @return bool
 */
function is_unix(): bool {
    return \in_array(
        \strtolower(read(runtime('os'), 'os.name')),
        ['bsd', 'darwin', 'solaris', 'linux'],
        true,
    );
}

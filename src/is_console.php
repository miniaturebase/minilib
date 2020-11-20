<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Determine if the program is being ran through a CLI.
 *
 * @return bool
 */
function is_console(): bool {
    return \in_array(read(runtime('interface'), 'interface', 'cli'), ['cli', 'phpdbg'], true);
}

<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Determine if the program is running through HTTP.
 *
 * @return bool
 */
function is_web(): bool {
    return !is_console();
}

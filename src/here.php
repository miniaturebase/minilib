<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Get the current full system file path that the current file resides in.
 *
 * @return string
 */
function here($directorySeparator = false): string {
    // dump(getcwd());
    $pathinfo = \pathinfo(read(head(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)), 'file'));
    
    return append($directorySeparator ? DIRECTORY_SEPARATOR : '', read($pathinfo, 'dirname'));
}

<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Return the caller of where this function is called, at the given level.
 *
 * @return string
 */
function me(int $level = 1, bool $extension = true): string {
    // dump(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $level + 1));
    $pathinfo = \pathinfo(read(tail(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $level + 1)), 'file'));
    $hasExtension = ($extension && \array_key_exists('extension', $pathinfo)) ? 'extension' : null;
    
    return \implode('.', only($pathinfo, \array_filter(['filename', $hasExtension])));
}
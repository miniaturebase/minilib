<?php

declare(strict_types = 1);

/**
 * This file is part of the minibase-app/minilib PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Minibase;

/**
 * Return the caller of where this function is called, at the given level.
 *
 * @return string
 */
function me(int $level = 1, bool $extension = true): string
{
    // dump(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $level + 1));
    $pathinfo = \pathinfo(read(tail(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $level + 1)), 'file'));
    $hasExtension = ($extension and \array_key_exists('extension', $pathinfo)) ? 'extension' : null;

    return path(only($pathinfo, \array_filter(['filename', $hasExtension])), '.');
}

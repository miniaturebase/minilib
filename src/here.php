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
 * Get the current full system file path that the current file resides in.
 *
 * @return string
 */
function here($directorySeparator = false): string
{
    // dump(getcwd());
    $pathinfo = \pathinfo(read(head(\debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)), 'file'));

    return append($directorySeparator ? DIRECTORY_SEPARATOR : '', read($pathinfo, 'dirname'));
}

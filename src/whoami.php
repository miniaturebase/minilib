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
 * Retrieves the current process owner's username.
 *
 * @return string|null
 */
function whoami(): ?string
{
    return read(posix_getpwuid(posix_geteuid()), 'name');
}

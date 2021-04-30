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
 * Check if the current operating system is in the Unix family.
 *
 * @return bool
 */
function is_unix(): bool
{
    return \in_array(
        \strtolower(read(runtime('os'), 'os.name')),
        ['bsd', 'darwin', 'solaris', 'linux'],
        true,
    );
}

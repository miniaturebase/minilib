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
 * Determine if the program is being ran through a CLI.
 *
 * @return bool
 */
function is_console(): bool
{
    return \in_array(read(runtime('interface'), 'interface', 'cli'), ['cli', 'phpdbg'], true);
}

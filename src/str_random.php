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
 * Generate a pseudo-random alpha-numeric Latin string of the given length.
 *
 * **NOTE:** Should not be considered sufficient for cryptography, etc.
 *
 * @param int $length The desired length of the generated random string
 * @return string
 * @see https://github.com/laravel/framework/blob/4.2/src/Illuminate/Support/Str.php#L240-L242
 */
function str_random(int $length = 8): string
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return \substr(\str_shuffle(\str_repeat($pool, 5)), 0, $length);
}

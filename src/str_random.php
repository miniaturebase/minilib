<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Generate a pseudo-random alpha-numeric Latin string of the given length.
 * 
 * **NOTE:** Should not be considered sufficient for cryptography, etc.
 *
 * @param int $length The desired length of the generated random string
 * @return string
 * @see https://github.com/laravel/framework/blob/4.2/src/Illuminate/Support/Str.php#L240-L242
 */
function str_random(int $length = 8): string {
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return \substr(\str_shuffle(\str_repeat($pool, 5)), 0, $length);
}

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2020 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

/**
 * Return the IP address of the connecting client, with an optional fallback
 * value.
 *
 * @param string $default The default IP address to return if none can be detected.
 * @return string
 */
function ip($default = '127.0.0.1'): string
{
    $isValid = function (string $ip) {
        return \filter_var($ip, FILTER_VALIDATE_IP);
    };

    if (is_console()) {
        $ip = \gethostbyname(\gethostname());

        return (!$isValid($ip)) ? $default : $ip;
    }

    $fromServer = function ($key) use ($isValid) {
        $ip = read($_SERVER, $key);

        return (!blank($ip) and $isValid($ip)) ? $ip : null;
    };

    return transform('HTTP_CLIENT_IP', $fromServer)
        ?? transform('HTTP_X_FORWARDED_FOR', $fromServer)
        ?? transform('REMOTE_ADDR', $fromServer)
        ?? $default;
}

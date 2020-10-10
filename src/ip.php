<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Return the IP address of the connecting client, with an optional fallback
 * value. 
 *
 * @param string $default The default IP address to return if none can be detected.
 * @return string
 */
function ip($default = '127.0.0.1'): string {
    $isValid = function (string $ip) {
        return \filter_var($ip, FILTER_VALIDATE_IP);
    };
    
    if (\php_sapi_name() === 'cli') {
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
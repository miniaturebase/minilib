<?php

declare(strict_types = 1);

namespace Phelpers;

function runtime() {
// function runtime(bool $errors = false, bool $clear = false) {

    // $sapi = \php_sapi_name();
    // $isCli = 'cli' === $sapi;

    // if ($clear && $isCli) {
    //     \system('clear');
    // }

    // if ($errors) {
    //     \error_reporting(\E_ALL);
    //     \ini_set('display_errors', 1);
    // }

    $calcMemUsage = function ($x) {
        return @\round($x / \pow(1024, ($i = \floor(\log($x, 1024)))), 2).' '.['b', 'kb', 'mb', 'gb', 'tb', 'pb'][$i];
    };
    $env = [
        'operating_system' => \php_uname('s'),
        'machine_architecture' => \php_uname('m'),
        'os_version' => \php_uname('v'),
        'os_release' => \php_uname('r'),
        'php_sapi_version' => \sprintf('%s (%s)', \phpversion(), \php_sapi_name()),
        'zend_version' => \zend_version(),
        'memory' => (object) [
            'limit' => \ini_get('memory_limit'),
            'used' => $calcMemUsage(\memory_get_usage(\true)),
        ],
        'user' => whoami(),
    ];

    // if ($isCli) {
    //     foreach ($env as $key => $value) {
    //         echo \PHP_EOL.' '.ucwords(\str_replace('_', ' ', $key)).': '.$value;
    //     }

    //     return;
    // }

    return (object) $env;
}
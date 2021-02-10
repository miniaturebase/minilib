<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

use Closure;

/**
 * Receive information about the current environment running the program.
 *
 * **Available Keys:** `interface`, `user`, `os`, `version`, and `memory`.
 *
 * @param string ...$keys A variadic set of keys that will be used to return a subset of information
 * @return array
 */
function runtime(string ...$keys): array
{
    $env = [
        'interface' => static function (): string {
            return \PHP_SAPI;
        },
        'user' => static function (): string {
            return whoami();
        },
        'os' => static function (): array {
            return [
                'architecture' => \php_uname('m'),
                'name'         => \PHP_OS_FAMILY,
                'release'      => \php_uname('r'),
                'version'      => \php_uname('v'),
            ];
        },
        'version' => static function (): array {
            return [
                'id'   => \PHP_VERSION_ID,
                'sapi' => \sprintf('%s (%s)', \PHP_VERSION, \PHP_SAPI),
                'zend' => \zend_version(),
            ];
        },
        'memory' => static function (): array {
            $calcMemUsage = static function ($x) {
                return @\round($x / \pow(1024, ($i = \floor(\log($x, 1024)))), 2).' '.['b', 'kb', 'mb', 'gb', 'tb', 'pb'][$i];
            };

            return [
                'limit' => \ini_get('memory_limit'),
                'used'  => $calcMemUsage(\memory_get_usage(\true)),
            ];
        },
    ];
    $isSubset = !empty($keys);
    $subjects = (($isSubset) ? only($env, $keys) : $env);

    return \array_combine(
        \array_keys(($isSubset) ? only(\array_flip(\array_keys($env)), $keys) : $env),
        map($subjects, static function (Closure $property) {
            return value($property);
        }),
    );
}

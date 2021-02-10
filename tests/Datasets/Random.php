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

use function Phelpers\array_make;
use function Phelpers\generate;
use function Phelpers\random_float;

dataset('random', static function (): Generator {
    yield from [
        'boolean' => [(bool) rand(0, 1)],
        'integer' => [rand(PHP_INT_MIN, PHP_INT_MAX)],
        'float'   => [random_float(0, 1)],
        'string'  => ['jah-ith-ber'],
        'array'   => [
            array_make(3),
        ],
        'object' => [
            (object) [
                'runes'  => ['tal', 'thul', 'ort', 'amn'],
                'name'   => 'Spirit',
                'reqlvl' => 54,
            ],
        ],
        'null'      => [null],
        'resource'  => [fopen(__FILE__, 'r')],
        'generator' => generate(3),
    ];
});

<?php

declare(strict_types = 1);

use function Phelpers\array_make;
use function Phelpers\generate;
use function Phelpers\random_float;

dataset('random', static function (): Generator {
    yield from [
        'boolean' => [(bool) rand(0, 1)],
        'integer' => [rand(PHP_INT_MIN, PHP_INT_MAX)],
        'float' => [random_float(0, 1)],
        'string' => ['jah-ith-ber'],
        'array' => [
            array_make(3),
        ],
        'object' => [
            (object) [
                'runes' => ['tal', 'thul', 'ort', 'amn'],
                'name' => 'Spirit',
                'reqlvl' => 54,
            ],
        ],
        'null' => [null],
        'resource' => [fopen(__FILE__, 'r')],
        'generator' => generate(3),
    ];
});

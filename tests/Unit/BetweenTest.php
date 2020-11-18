<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use Generator;
use InvalidArgumentException;
use stdClass;

use function Phelpers\between;
use function Phelpers\str_random;

it('can detect when a given value is between another two', function ($subject, $min, $max): void {
    expect(between($subject, $min, $max))->toBeTrue();
})->with([
    [1, 0, 2],
    [0.55, 0.5, 0.6],
    ['10', '5', '20'],
    [10, 5.95, '20'],
    ['10.33', 10.3, 11],
]);

it('can detect when a given value is not between another two', function ($subject, $min, $max): void {
    expect(between($subject, $min, $max))->toBeFalse();
})->with([
    [0, 1, 2],
    [0.5, 0.55, 0.6],
    ['5', '10', '20'],
    [5.95, 10, '20'],
    [10.3, '10.33', 11],
]);

it('throws errors with non-numeric input', function ($subject, $min, $max): void {
    between($subject, $min, $max);
})->throws(InvalidArgumentException::class)->with(static function (): Generator {
    yield from [
        'null subject' => [null, rand(0, 10), rand(0, 10)],
        'null min' => [rand(0, 10), null, rand(0, 10)],
        'null max' => [rand(0, 10), rand(0, 10), null],

        'bool subject' => [(bool) rand(0, 1), rand(0, 10), rand(0, 10)],
        'bool min' => [rand(0, 10), (bool) rand(0, 1), rand(0, 10)],
        'bool max' => [rand(0, 10), rand(0, 10), (bool) rand(0, 1)],

        'string (non-numeric) subject' => [str_random(6), rand(0, 10), rand(0, 10)],
        'string (non-numeric) min' => [rand(0, 10), str_random(6), rand(0, 10)],
        'string (non-numeric) max' => [rand(0, 10), rand(0, 10), str_random(6)],

        'array subject' => [[], rand(0, 10), rand(0, 10)],
        'array min' => [rand(0, 10), [], rand(0, 10)],
        'array max' => [rand(0, 10), rand(0, 10), []],

        'object subject' => [new stdClass, rand(0, 10), rand(0, 10)],
        'object min' => [rand(0, 10), new stdClass, rand(0, 10)],
        'object max' => [rand(0, 10), rand(0, 10), new stdClass],
        
        'resource subject' => [fopen('php://temp', 'r'), rand(0, 10), rand(0, 10)],
        'resource min' => [rand(0, 10), fopen('php://temp', 'r'), rand(0, 10)],
        'resource max' => [rand(0, 10), rand(0, 10), fopen('php://temp', 'r')],
    ];
});
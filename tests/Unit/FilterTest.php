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

use function Minibase\array_make;
use function Minibase\between;
use function Minibase\filter;
use function Minibase\read;
use function Minibase\str_random;
use function Minibase\value;

it('receives value, key, and the iterable', function (): void {
    filter(['foo' => 1], function (int $value, string $key, array $items): void {
        expect($value)
            ->toBe(1)
            ->and($key)
            ->toBe('foo')
            ->and($items)
            ->toBe(['foo' => 1]);
    });
});

it('retains keys', function (): void {
    expect(filter(['foo' => 1, 'bar' => 2], function ($value): bool {
        return 0 === $value % 2;
    }))->toHaveKeys(['bar'])->not()->toHaveKeys(['foo']);
});

it('filters falsey', function (array $items): void {
    expect(filter($items))->toBe([]);
})->with([
    'empty'               => [[]],
    'null'                => [[null]],
    'false'               => [[false]],
    'zero (integer)'      => [[0]],
    'string'              => [['']],
    'empty array'         => [[[]]],
    'various empty items' => [
        array_make(rand(6, 12), function () {
            $sample = [null, false, 0, '', []];

            return read($sample, array_rand($sample));
        }),
    ],
]);

it('filters truthy', function (array $items): void {
    expect(filter($items))->toBe($items);
})->with([
    'filled'               => [range(1, rand(1, 7))],
    'true'                 => [[true]],
    'integer (non-zero)'   => [[rand(1, PHP_INT_MAX)]],
    'string'               => [[str_random()]],
    'filled array'         => [[range(1, rand(1, 7))]],
    'object'               => [[(object) []]],
    'various filled items' => [
        array_make(rand(6, 12), function () {
            $sample = [(object) [], true, 1, str_random(), range(1, 1)];

            return read($sample, array_rand($sample));
        }),
    ],
]);

it('filters array-like objects', function (): void {
    $size = 8;
    $memory = new SplFixedArray($size);

    expect(filter($memory, function ($block): bool {
        return empty($block);
    }))->toHaveCount($size);
});

it('filters generators', function (): void {
    expect(filter(value(function (): Generator {
        yield rand(1, 100);
    }), function (int $number): bool {
        return between($number, 1, 50);
    }))->toBeArray();
});

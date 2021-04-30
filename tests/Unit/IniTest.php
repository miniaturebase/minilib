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

namespace Minibase\Tests\Unit;

use function Minibase\ini;
use function Minibase\random_float;
use function Minibase\read;

use stdClass;
use TypeError;

it('throws exception when document is not correct type', function ($source): void {
    ini($source);
})->throws(TypeError::class)->with([
    'null source'            => [null],
    'boolean source'         => [(bool) rand(0, 1)],
    'integer source'         => [rand(PHP_INT_MIN, PHP_INT_MAX)],
    'float (decimal) source' => [random_float(PHP_FLOAT_MIN, PHP_FLOAT_MAX)],
    'object source'          => [new stdClass()],
]);

it('ignores comments')
    ->expect(ini("; some comment only file\n"))
    ->toBeArray()
    ->toBeEmpty();

it('reads .ini files', function ($source): void {
    expect(ini($source))
        ->toBeArray()
        ->not()
        ->toBeEmpty();
})->with([
    'file path'     => [sprintf('%s/../Fixtures/test.ini', __DIR__)],
    'file resource' => [fopen(sprintf('%s/../Fixtures/test.ini', __DIR__), 'r')],
    'file contents' => [
        <<<'INI'
foo="hello world!"
bar=[]
baz=1
qux=true
; some comment
INI,
    ],
    'pre-parsed contents (array)' => [
        [
            'foo' => 'hello world!',
            'bar' => [],
            'baz' => 1,
            'qux' => true,
        ],
    ],
]);

it('parses scalar values', function (string $key, $value, string $source): void {
    expect(ini($source))
        ->toBeArray()
        ->toHaveCount(1)
        ->toHaveKey($key)
        ->toContain($value);
})->with([
    'null' => [
        'jah',
        null,
        'jah=null',
    ],
    'booleans (true)' => [
        'ith',
        true,
        'ith=true',
    ],
    'booleans (false)' => [
        'ber',
        false,
        'ber=false',
    ],
    'integers' => [
        'ral',
        1342,
        'ral=1342',
    ],
    'strings' => [
        'tal',
        'hello world!',
        'tal="hello world!"',
    ],
]);

it('handles maps and dot paths', function () {
    $ini = ini(<<<'INI'
foo.jah=1
foo.ith=2
foo.ber=3
INI);

    expect($ini)
        ->toBeArray()
        ->toHaveKeys(['foo'])
        ->toHaveCount(1)
        ->and(read($ini, 'foo', []))
        ->toHaveCount(3)
        ->toHaveKeys(['jah', 'ith', 'ber']);
});

it('handles inheritance', function () {
    $ini = ini(<<<'INI'
[default]
foo=true
bar=true

[dev < default]
foo=false
INI);

    expect($ini)
        ->toBeArray()
        ->toHaveKeys(['default', 'dev'])
        ->and(read($ini, 'dev.bar'))
        ->toBeTrue()
        ->and(read($ini, 'dev.foo'))
        ->toBeFalse();
});

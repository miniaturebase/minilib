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

use Generator;
use InvalidArgumentException;
use function Minibase\append;
use function Minibase\str_random;
use stdClass;

it('appends things to arrays', function (
    $expected,
    $tail,
    $subject
): void {
    expect(append($tail, $subject))
        ->toBe($expected)
        ->toBeArray()
        ->toContain($tail);
})->with([
    'simple array push' => [[0, 1], 1, [0]],
]);

it('appends things to strings', function (
    $expected,
    $tail,
    $subject,
    string $delimeter = ''
): void {
    expect(append($tail, $subject, $delimeter))
        ->toBe($expected)
        ->toBeString();
})->with(static function (): Generator {
    yield from [
        'filename extension'                     => ['index.php', '.php', 'index'],
        'hello world!'                           => ['Hello World!', 'World!', 'Hello', ' '],
        'comma-seperated list'                   => ['1,2', 2, '1', ','],
        'comma-seperated list all integers'      => ['1,2', 2, 1, ','],
        'class instance implementing __toString' => [
            'hey man, waaazzuupp',
            'waaazzuupp',
            new class() {
                public function __toString(): string
                {
                    return 'hey man, ';
                }
            },
        ],
    ];
});

it('throws invalid input type errors', function ($tail, $subject): void {
    append($tail, $subject);
})->throws(InvalidArgumentException::class)->with(static function (): Generator {
    yield from [
        'appending an array onto a string' => [[], str_random(6)],
        'appending to random object'       => [[], new stdClass()],
    ];
});

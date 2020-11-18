<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use Generator;
use InvalidArgumentException;
use stdClass;

use function Phelpers\prepend;
use function Phelpers\str_random;

it('prepends things to strings', function (
    $expected, 
    $head, 
    $subject, 
    $delimeter = ''
): void {
    expect(prepend($head, $subject, $delimeter))
        ->toBe($expected)
        ->toBeString();
})->with([
    'filename extension' => ['index.php', 'index', '.php'],
    'hello world!' => ['Hello World!', 'Hello', 'World!', ' '],
    'comma-seperated list' => ['1,2', '1', 2, ','],
    'comma-seperated list of integers' => ['1,2', 1, 2, ','],
    'class instance implementing __toString' => [
        'hey man, waaazzuupp', 
        'hey man, ', 
        new class {
            public function __toString(): string
            {
                return 'waaazzuupp';
            }
        }
    ],
]);

it('throws invalid input type errors', function ($tail, $subject): void {
    prepend($tail, $subject);
})->throws(InvalidArgumentException::class)->with(static function (): Generator {
    yield from [
        'prepending an array onto a string' => [[], str_random(6)],
        'prepending to random object' => [[], new stdClass],
    ];
});

<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\append;

it('appends things to strings', function (
    $expected,
    $tail,
    $subject, 
    string $delimeter = ''
): void {
    expect(append($tail, $subject, $delimeter))
        ->toBe($expected)
        ->toBeString();
})->with([
    'filename extension' => ['index.php', '.php', 'index'],
    'hello world!' => ['Hello World!', 'World!', 'Hello', ' '],
    'comma-seperated list' => ['1,2', 2, '1', ','],
    'comma-seperated list all integers' => ['1,2', 2, 1, ','],
]);
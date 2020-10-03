<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\prepend;

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
]);
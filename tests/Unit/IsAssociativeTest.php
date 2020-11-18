<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\is_associative;

it('detects indexed arrays', function (array $array): void {
    expect(is_associative($array))->toBeFalse();
})->with([
    'empty array' => [[]],
    'list (array)' => [range(0, rand(1, 24))],
]);

it('detects associative arrays', function (array $array): void {
    expect(is_associative($array))->toBeTrue();
})->with([
    'map of strings to values' => [['sup' => 'dawg']],
    'map of integers to values' => [[1 => 'hello world!']],
]);

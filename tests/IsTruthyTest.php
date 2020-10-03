<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{is_truthy, str_random};

it('can discern truthy values', function ($subject): void {
    expect(is_truthy($subject))->toBeTrue();
})->with([
    'literal true' => [true],
    'string "true"' => ['true'],
    'string "active"' => ['active'],
    'string "enabled"' => ['enabled'],
    'string "yes"' => ['yes'],
    'string "on"' => ['on'],
    'string "1"' => ['1'],
    'int 1' => [1],
    'populated array' => [range(0, rand(1, 69))],
    'object' => [(object) []],
]);

it('can discern falsey values', function ($subject): void {
    expect(is_truthy($subject))->toBeFalse();
})->with([
    'empty array' => [[]],
    'empty string' => [''],
    'any string' => [str_random(rand(1, 420))],
    'literal null' => [null],
]);
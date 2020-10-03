<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\value;

it('evaluates variables', function ($value): void {
    expect(value($value))
        ->toEqual($value)
        ->toBe($value);
})->with('random');

it('evaluates closures', function ($value): void {
    $closure = static function () use ($value) {
        return $value;
    };
    
    expect(value($closure))
        ->toEqual($value)
        ->toBe($value);
})->with('random');
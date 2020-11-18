<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\swap;

it('swaps variable values', function (): void {
    $foo = true;
    $bar = false;
    
    swap($foo, $bar);
    expect($foo)
        ->toBeFalse()
        ->and($bar)
        ->toBeTrue();
    swap($foo, $bar);
    expect($foo)
        ->toBeTrue()
        ->and($bar)
        ->toBeFalse();
});

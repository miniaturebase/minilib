<?php

declare(strict_types = 1);

use function Phelpers\array_make;
use function Phelpers\head;
use function Phelpers\str_random;

test('creating arrays', function (): void {
    expect(array_make(1))
        ->toBeArray()
        ->toHaveCount(1);
});

test('creating arrays with a closure are different', function (): void {
    $items = [
        rand(1, 10),
        static function () {
            return str_random(4);
        },
    ];
    
    expect(array_make(...$items))
        ->toBeArray()
        ->toHaveCount(head($items))
        ->not()
        ->toEqual(array_make(...$items));
});

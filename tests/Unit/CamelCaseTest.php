<?php

declare(strict_types = 1);

use function Phelpers\camel_case;
use function Phelpers\map;

it('camel cases strings', function ($expected, string ...$subjects): void {
    map($subjects, static function ($subject) use ($expected): void {
        expect(camel_case($subject))
            ->toBeString()
            ->not()
            ->toBeEmpty()
            ->not()
            ->toContain('-')
            ->not()
            ->toContain('_')
            ->not()
            ->toContain(' ')
            ->toBe($expected);
    });
})->with([
    'two words' => [
        'talOrt', 
        'TalOrt',
        'tal_ort', 
        'tal-ort', 
        'tal ort',
        'tal        ort', 
        'tal-_Ort', 
        'tal _ - Ort',
    ],
]);

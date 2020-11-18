<?php

declare(strict_types = 1);

use function Phelpers\generate;
use function Phelpers\read;
use function Phelpers\map;
use function Phelpers\str_random;

it('creates a generator', function (): void {
    expect(generate(rand(0, 10)))
        ->toBeIterable()
        ->toBeInstanceOf(Generator::class);
});

it('generates from callbacks', function (): void {
    $users = generate([1, 2, 3], static function (int $item): array {
        return ['id' => $item, 'username' => str_random(6)];
    });
    
    expect($users)
        ->toBeIterable()
        ->toBeInstanceOf(Generator::class)
        ->and(map($users, function (array $user): array {
            expect($user)
                ->toHaveKeys(['id', 'username'])
                ->and($user['id'])
                ->toBeInt()
                ->toBeLessThanOrEqual(3);
            
            return $user;
        }))
        ->toBeArray()
        ->toHaveCount(3);
        
});

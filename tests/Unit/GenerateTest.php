<?php

declare(strict_types = 1);

/**
 * This file is part of the minibase-app/minilib PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use function Minibase\generate;
use function Minibase\map;
use function Minibase\str_random;

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

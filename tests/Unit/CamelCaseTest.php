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

use function Minibase\camel_case;
use function Minibase\map;

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

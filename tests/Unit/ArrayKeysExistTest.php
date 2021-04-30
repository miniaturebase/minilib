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

namespace Minibase\Tests\Unit;

use function Minibase\array_keys_exist;

use stdClass;

test('array multiple keys can be checked at once', function (
    array $keys,
    array $subject
): void {
    expect(array_keys_exist($keys, $subject))->toBeTrue();
})->with([
    'empty array (no indices)'        => [[], []],
    'indexed array (integer indices)' => [
        [0, 1, 2, 3, 4, 5, 6],
        ['asdf', [], new stdClass(), 1, 6.9, ((bool) rand(0, 1)), null],
    ],
    'associative array (string indices)' => [
        ['string', 'array', 'object'],
        ['string' => 'asdf', 'array' => [], 'object' => new stdClass(), 'integer' => 1, 'float' => 6.9, 'bool' => ((bool) rand(0, 1)), 'null' => null],
    ],
    'mixed array (string/integer indices)' => [
        [0, 'foo'],
        ['foo' => 1, 'bar', 'baz', 'qux' => []],
    ],
]);

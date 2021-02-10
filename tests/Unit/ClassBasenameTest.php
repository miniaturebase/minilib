<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers\Tests\Unit;

use Exception;

use function Phelpers\class_basename;

it('can parse the base class name from any string', function (
    string $expected,
    $value
): void {
    expect(class_basename($value))->toBe($expected);
})->with([
    'class string name'                     => ['Classname', '\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname'],
    'class string name with trailing slash' => ['Classname', '\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname\\'],
    'class instance'                        => ['Exception', new Exception()],
    'empty string'                          => ['', ''],
    'blank string'                          => ['', '   '],
]);

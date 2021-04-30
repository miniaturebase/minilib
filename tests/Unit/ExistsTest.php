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

use function Minibase\exists;

it('exists', function (): void {
    $path = ['foo' => ['bar' => ['baz' => 'qux']]];

    expect(exists($path, 'foo.bar.baz'))
        ->toBeTrue()
        ->and(exists($path, 'baz.bar.foo'))
        ->toBeFalse()
        ->and(exists($path, 'hello'))
        ->toBeFalse()
        ->and(exists($path, 'foo.bar'))
        ->toBeTrue();
});

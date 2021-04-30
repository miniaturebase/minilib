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

use function Minibase\collapse;

it('collapses multi-dimensional arrays into flat arrays with dot notation keys')
    ->skip('not sure how this function should even behave yet...')
    ->expect(collapse(['foo' => ['bar' => ['baz' => 'qux']]]))
    ->toHaveKey('foo.bar.baz')
    ->toContain('qux')
    ->toHaveCount(1);

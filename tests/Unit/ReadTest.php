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

use function Phelpers\read;

it('reads magic properties', function (): void {
    $magic = new class() {
        private $attributes = [];

        public function __get($property)
        {
            return $this->attributes[$property] ?? null;
        }

        public function __isset($property): bool
        {
            return !is_null($this->attributes[$property] ?? null);
        }

        public function __set($property, $value): void
        {
            $this->attributes[$property] = $value;
        }
    };

    expect(read($magic, 'foo'))->toBeNull();

    $magic->foo = 'hi';

    expect(read($magic, 'foo'))
        ->not()
        ->toBeNull()
        ->toBe('hi');

    $magic->bar = ['baz' => 420];

    expect(read($magic, 'bar.baz'))->toBe(420);
});

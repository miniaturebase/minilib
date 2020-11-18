<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\exists;

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

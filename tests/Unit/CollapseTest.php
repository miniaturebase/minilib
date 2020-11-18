<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\collapse;


it('collapses multi-dimensional arrays into flat arrays with dot notation keys')
    ->skip('not sure how this function should even behave yet...')
    ->expect(collapse(['foo' => ['bar' => ['baz' => 'qux']]]))
    ->toHaveKey('foo.bar.baz')
    ->toContain('qux')
    ->toHaveCount(1);

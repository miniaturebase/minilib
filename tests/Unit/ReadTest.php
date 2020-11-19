<?php

declare(strict_types = 1);

namespace Phelpers\Tests\Unit;

use function Phelpers\read;

it('reads magic properties', function (): void {
    $magic = new class() {
        private $attributes = [];
        
        public function __get($property)
        {
            return $this->attributes[$property] ?? null;
        }
        
        public function __set($property, $value): void
        {
            $this->attributes[$property] = $value;
        }

        public function __isset($property): bool
        {   
            return !is_null($this->attributes[$property] ?? null);
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

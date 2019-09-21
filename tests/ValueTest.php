<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{value, random_float, array_make};
use PHPUnit\Framework\TestCase;
use Iterator;

final class ValueTest extends TestCase
{
    /**
     * @covers Phelpers\value
     * @dataProvider scalarValues
     * @dataProvider compoundValues
     * @dataProvider specialValues
     * @param mixed $value
     * @return void
     */
    public function testVariable($value): void
    {
        $actual = value($value);
        
        $this->assertEquals($value, $actual);
        $this->assertSame($value, $actual);
    }

    /**
     * @covers Phelpers\value
     * @dataProvider scalarValues
     * @dataProvider compoundValues
     * @dataProvider specialValues
     * @param mixed $value
     * @return void
     */
    public function testClosure($value): void
    {
        $closure = function ($x) {
            return $x;
        };
        $actual = value($closure($value));
        
        $this->assertEquals($value, $actual, 'Failed to test value equaility of resolving of closures');
        $this->assertSame($value, $actual, 'Failed to test identity equaility of resolving of closures');
    }

    public function scalarValues(): Iterator
    {
        yield from [
            'boolean' => [(bool) rand(0, 1)],
            'integer' => [rand(PHP_INT_MIN, PHP_INT_MAX)],
            'float' => [random_float(0, 1)],
            'string' => ['jah-ith-ber'],
        ];
    }

    public function compoundValues(): Iterator
    {
        yield from [
            'array' => [
                array_make(3),
            ],
            'object' => [
                (object) [
                    'runes' => ['tal', 'thul', 'ort', 'amn'],
                    'name' => 'Spirit',
                    'reqlvl' => 54,
                ]
            ]
        ];
    }

    public function specialValues(): Iterator
    {
        yield from [
            'null' => [null],
            'resource' => [fopen(__FILE__, 'r')],
        ];
    }
}
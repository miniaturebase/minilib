<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{is_truthy, str_random};
use PHPUnit\Framework\TestCase;
use Iterator;

final class IsTruthyTest extends TestCase
{
    /**
     * @covers Phelpers\is_truthy
     * @uses Phelpers\str_random
     * @dataProvider truthies
     * @param mixed $subject
     * @return void
     */
    public function testTruthyness($subject): void
    {
        $this->assertTrue(is_truthy($subject));
    }

    public function truthies(): Iterator
    {
        yield from [
            'literal true' => [true],
            'string "true"' => ['true'],
            'string "active"' => ['active'],
            'string "enabled"' => ['enabled'],
            'string "yes"' => ['yes'],
            'string "on"' => ['on'],
            'string "1"' => ['1'],
            'int 1' => [1],
            'populated array' => [range(0, rand(1, 69))],
            'object' => [(object) []],
        ];
    }
    /**
     * @covers Phelpers\append
     * @dataProvider falsies
     * @param mixed $subject
     * @return void
     */
    public function testFalsies($subject): void
    {
        $this->assertTrue(!is_truthy($subject));
    }

    public function falsies(): Iterator
    {
        yield from [
            'empty array' => [[]],
            'empty string' => [''],
            'any string' => [str_random(rand(1, 420))],
            'literal null' => [null],
        ];
    }
}
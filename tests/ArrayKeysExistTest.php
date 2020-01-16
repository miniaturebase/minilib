<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{array_keys_exist};
use PHPUnit\Framework\TestCase;
use Iterator;
use stdClass;

final class ArrayKeysExistTest extends TestCase
{
    /**
     * @covers Phelpers\append
     * @dataProvider strings
     * @param mixed $expected
     * @param mixed $tail
     * @param mixed $subject
     * @param string $delimeter
     * @return void
     */
    public function test(array $keys, array $subject): void
    {
        $this->assertTrue(array_keys_exist($keys, $subject));
    }

    public function strings(): Iterator
    {
        yield from [
            'empty array (no indices)' => [[], []],
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
        ];
    }
}
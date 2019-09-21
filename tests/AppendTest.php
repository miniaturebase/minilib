<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{append, random_float};
use PHPUnit\Framework\TestCase;
use Iterator;

final class AppendTest extends TestCase
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
    public function test($expected, $tail, $subject, $delimeter = ''): void
    {
        $this->assertSame($expected, append($tail, $subject, $delimeter));
    }

    public function strings(): Iterator
    {
        yield from [
            'filename extension' => ['index.php', '.php', 'index'],
            'hello world!' => ['Hello World!', 'World!', 'Hello', ' '],
            'comma-seperated list' => ['1,2', 2, '1', ','],
            'comma-seperated list all integers' => ['1,2', 2, 1, ','],
        ];
    }
}
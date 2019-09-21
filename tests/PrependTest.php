<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{prepend, random_float};
use PHPUnit\Framework\TestCase;
use Iterator;

final class PrependTest extends TestCase
{
    /**
     * @covers Phelpers\prepend
     * @dataProvider strings
     * @param mixed $expected
     * @param mixed $head
     * @param mixed $subject
     * @param string $delimeter
     * @return void
     */
    public function test($expected, $head, $subject, $delimeter = ''): void
    {
        $this->assertSame($expected, prepend($head, $subject, $delimeter));
    }

    public function strings(): Iterator
    {
        yield from [
            'filename extension' => ['index.php', 'index', '.php'],
            'hello world!' => ['Hello World!', 'Hello', 'World!', ' '],
            'comma-seperated list' => ['1,2', '1', 2, ','],
            'comma-seperated list of integers' => ['1,2', 1, 2, ','],
        ];
    }
}
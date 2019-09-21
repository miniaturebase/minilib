<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use PHPUnit\Framework\TestCase;
use function Phelpers\{class_basename};
use Iterator;
use Exception;

final class ClassBasenameTest extends TestCase
{
    /**
     * @dataProvider classes
     * @param string $expected
     * @param mixed $value
     * @return void
     */
    public function test(string $expected, $value): void
    {
        $this->assertSame($expected, class_basename($value));
    }

    public function classes(): Iterator
    {
        yield from [
            'class string name' => ['Classname', '\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname'],
            'class instance' => ['Exception', new Exception],
            'empty string' => ['', ''],
            'blank string' => ['', '   '],
        ];
    }
}
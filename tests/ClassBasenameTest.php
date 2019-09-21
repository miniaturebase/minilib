<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use PHPUnit\Framework\TestCase;
use function Phelpers\class_basename;

final class ClassBasenameTest extends TestCase
{
    public function test(): void
    {
        $expected = 'Classname';
        $actual = class_basename('\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname');

        $this->assertSame($expected, $actual);
    }
}
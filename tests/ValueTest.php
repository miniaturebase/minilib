<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\value;
use PHPUnit\Framework\TestCase;

final class ValueTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame('test', value('test'));
    }
}
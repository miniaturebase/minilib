<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{ordinal};
use PHPUnit\Framework\TestCase;

final class OrdinalTest extends TestCase
{
    public function test(): void
    {
        $this->assertSame('21st', ordinal(21));
    }
}
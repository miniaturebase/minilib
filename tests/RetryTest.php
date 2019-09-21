<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\{retry};
use PHPUnit\Framework\TestCase;

final class RetryTest extends TestCase
{
    public function test(): void
    {
        $actual = 0;
        $expected = 10;
        retry($expected, function () use (&$actual, $expected) {
            $actual++;

            if ($actual < $expected) {
                throw new \Exception;
            }
        });

        $this->assertSame($expected, $actual);
    }
}
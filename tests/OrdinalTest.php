<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\ordinal;

it('ordinates')->assertSame('21st', ordinal(21));
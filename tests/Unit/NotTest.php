<?php

declare(strict_types = 1);

use function Minibase\not;
use function Minibase\value;

it('negates predicates')
    ->expect(value(not(function (): bool {
        return true;
    })))
    ->toBe(false);

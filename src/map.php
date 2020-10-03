<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

function map(iterable $iterable, callable $closure) {
    $new = [];

    foreach ($iterable as $key => $value) {
        $new[$key] = $closure($value, $key);
    }
    
    return $new;
}
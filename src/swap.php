<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Swap the values of two variables (passed by reference).
 *
 * @param mixed $a
 * @param mixed $b
 * @return void
 */
function swap(&$a, &$b) {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}
<?php

declare(strict_types = 1);

namespace Phelpers;

/**
 * Swap the values of two variables (passed by reference).
 *
 * @param mixed $a First variable to have it's value swapped with another
 * @param mixed $b Second variable to swap values with
 * @return void
 */
function swap(&$a, &$b): void {
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}
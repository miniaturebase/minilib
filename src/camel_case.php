<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2020 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

/**
 * Transform a string's casing into _**camel** case_.
 *
 * @param string $subject The string to transform casing.
 * @return string
 * @uses pascal_case
 * @see https://en.wikipedia.org/wiki/Letter_case#Special_case_styles
 */
function camel_case(string $subject): string
{
    return \lcfirst(pascal_case($subject));
}

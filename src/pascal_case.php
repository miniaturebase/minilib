<?php

declare(strict_types = 1);

/**
 * This file is part of the minibase-app/minilib PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Minibase;

/**
 * Transform a string's casing into _**pascal** case_.
 *
 * @param string $subject The string to transform casing.
 * @return string
 * @see https://en.wikipedia.org/wiki/Camel_case#Variations_and_synonyms
 */
function pascal_case(string $subject): string
{
    return \str_replace(' ', '', \ucwords(\str_replace(['-', '_'], ' ', $subject)));
}

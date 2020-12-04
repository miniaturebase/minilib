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

use Countable;

/**
 * Determine if the givenn value is "blank" (essentially `empty` on steroids).
 *
 * @param mixed $subject The subject to inspect for "blank-ness".
 * @return boolean
 */
function blank($subject): bool
{
    if (\is_null($subject)) {
        return true;
    }

    if (\is_string($subject)) {
        return empty(\trim($subject));
    }

    if (\is_numeric($subject) or \is_bool($subject)) {
        return false;
    }

    if ($subject instanceof Countable) {
        return (bool) \count($subject);
    }

    return empty($subject);
}

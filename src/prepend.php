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

use InvalidArgumentException;

/**
 * Prepend an item onto a given subject.
 *
 * @param mixed $head
 * @param array|string|int|float $subject
 * @param string $delimiter
 * @return array|string
 */
function prepend($head, $subject, string $delimiter = '')
{
    $isStringable = function ($subject): bool {
        return \is_string($subject)
            or \is_numeric($subject)
            or (\is_object($subject) and \method_exists($subject, '__toString'));
    };

    if ($isStringable($subject) and !$isStringable($head)) {
        throw new InvalidArgumentException(\sprintf('Arguments 1 and 2 passed to %s must be of the type %s, %s|%s given', __FUNCTION__, 'string', \gettype($head), \gettype($subject)));
    }
    if (!\is_array($subject) and !$isStringable($subject)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array', \gettype($subject)));
    }

    if (\is_array($subject)) {
        \array_unshift($subject, $head);

        return $subject;
    }

    return $head.$delimiter.$subject;
}

<?php

declare(strict_types = 1);

/**
 * This file is part of the jordanbrauer/phelpers PHP library.
 *
 * @copyright 2021 Jordan Brauer <18744334+jordanbrauer@users.noreply.github.com>
 * @license MIT
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phelpers;

use InvalidArgumentException;

/**
 * Optionally preppend the delimiter to the path, indicating an absolute path. If
 * used on a DOS/Windows operating system the OS drive will be detected and
 * prepended to the result.
 */
const PATHINFO_ABSOLUTE = 1;

/**
 * Optionally append the trailing delimiter to the path, indicating a directory.
 */
const PATHINFO_TRAILING = 2;

/**
 * Create a path from the given segments, delimiter and options.
 *
 * @param string[]|array|null $segments A list of segments to create a path from
 * @param string $delimiter The optional 1-byte delimiter to use for the path – by default it uses the operating system directory separator
 * @param int $options A bitmask of `Phelpers\PATHINFO_*` constants
 * @return string
 * @throws InvalidArgumentException
 */
function path(?array $segments, string $delimiter = \DIRECTORY_SEPARATOR, int $options = 0): string
{
    if (blank($delimiter)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s() cannot be empty or contain only white space', __FUNCTION__));
    }

    if (1 < \strlen($delimiter)) {
        throw new InvalidArgumentException(\sprintf('Argument 2 passed to %s() may not exceed 1 byte in size, %s given', __FUNCTION__, \strlen($delimiter)));
    }

    $isDirectory = \DIRECTORY_SEPARATOR === $delimiter;

    if ($isDirectory
        and '~' === \trim(head(wrap($segments)) ?? '')
        and is_unix()
    ) {
        \array_shift($segments);
        \array_unshift($segments, read(\posix_getpwnam(whoami()) ?: [], 'dir', '~'));
    }

    $path = \implode(
        $delimiter,
        \array_filter(wrap($segments), static function ($segment): bool {
            return \is_numeric($segment)
                or (\is_string($segment) and !empty($segment));
        }),
    );

    if (PATHINFO_ABSOLUTE === ($options & PATHINFO_ABSOLUTE)) {
        $path = ($isDirectory and is_windows())
            ? prepend(\sprintf('%s%s', \getenv('SystemDrive') ?: 'C:', $delimiter), $path)
            : prepend($delimiter, $path);
    }

    if (PATHINFO_TRAILING === ($options & PATHINFO_TRAILING)) {
        $path = append($delimiter, $path);
    }

    return $path;
}

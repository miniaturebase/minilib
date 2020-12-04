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

use TypeError;

/**
 * Parse a complex `.ini` file with types, arrays, section inheritance, and
 * nested keys.
 *
 * @param string|array $source The path to an `.ini` file or an array from built-in `parse_ini_*` function(s)
 * @return array
 */
function ini($source): array
{
    $document = null;

    if (\is_array($source)) {
        $document = $source;
    } else {
        if (\is_resource($source) and 'stream' === \get_resource_type($source)) {
            \rewind($source);

            $contents = '';

            while (($line = \fgets($source)) !== false) {
                $contents = append($line, $contents);
            }

            \fclose($source);
            swap($contents, $source);
            unset($contents);
        }

        if (\is_string($source)) {
            $document = (\is_file($source))
                ? \parse_ini_file($source, true, \INI_SCANNER_TYPED)
                : \parse_ini_string($source, true, \INI_SCANNER_TYPED);
        }
    }

    if (\is_null($document)) {
        throw new TypeError(\sprintf('Argument 1 passed to %s() must be of the type %s, %s given', __FUNCTION__, 'array|string', \gettype($source)));
    }

    $root = [];
    $trim = static function (string $value): string {
        return \trim($value);
    };
    $parse = static function ($value) use ($trim) {
        if (\is_string($value)) {
            $value = $trim($value);
        }

        if (\is_numeric($value)) {
            if (false === \stristr((string) $value, '.')) {
                return (int) $value;
            }

            return (float) $value;
        }

        if (\is_array($value)) {
            return ini($value);
        }

        return $value;
    };

    map($document, static function ($value, $path) use (&$root, $parse, $trim) {
        $parent = null;
        $path = (string) $path; // handle lists ("arrays")
        $inheritance = \array_reverse(\array_map($trim, \explode('<', $path)));
        $value = transform($value, $parse);

        foreach (\array_slice($inheritance, 0, 2) as $section) {
            if (\array_key_exists($section, $root)) {
                $parent = read($root, $section);

                continue;
            }

            if ($parent) {
                write($root, $section, \array_merge($parent, $value));
            }
        }

        if (1 === \preg_match('/\s*(<)\s*/', $path)) {
            return;
        }

        write($root, $path, $value);
    });

    return $root;
}

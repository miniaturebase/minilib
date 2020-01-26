<?php

declare(strict_types = 1);

namespace Phelpers;

use InvalidArgumentException;

/**
 * Parse a complex `.ini` file with types, arrays, section inheritance, and
 * nested keys.
 * 
 * @param string|array $source The path to an `.ini` file or an array from built-in `parse_ini_*` function(s)
 * @return array
 */
function ini($source): array {
    $input = null;
    
    if (\is_string($source) and \file_exists($source)) {
        $input = \parse_ini_file($source, true);
    } else if (\is_array($source)) {
        $input = $source;
    }

    if (!$input) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|string', \gettype($source)));
    }
    
    $root = [];
    $toArray = static function (string $value, $transformer): array {
        $items = map(\explode(',', (\trim(\trim($value), '[]'))), static function (string $item) use ($transformer) {
            return transform($item, $transformer);
        });
        
        return \array_filter($items, static function ($value): bool {
            return !blank($value);
        });
    };
    $transformer = static function ($value) use (&$transformer, $toArray) {
        if (\is_array($value)) {
            $value = ini($value);
        } else if (\is_numeric($value) and \stristr((string) $value, '.')) {
            $value = (float) $value;
        } else if (\is_numeric($value)) {
            $value = (int) $value;
        } else if (\is_string($value) and '[]' === $value[0] . $value[-1]) {
            $value = $toArray($value, $transformer);
        }

        return $value;
    };
    
    map($input, static function ($value, $path) use (&$root, $transformer) {
        $parent = null;
        $inheritance = \array_reverse(\array_map(static function (string $value): string {
            return \trim($value);
        }, \explode('<', $path)));
        $value = transform($value, $transformer);
        
        foreach (\array_slice($inheritance, 0, 2) as $section) {
            if (\array_key_exists($section, $root)) {
                $parent = get($root, $section);

                continue;
            }

            if ($parent) {
                put($root, $section, \array_merge($parent, $value));
            }
        }

        if (1 === \preg_match('/\s*(<)\s*/', $path)) {
            return;
        }

        put($root, $path, $value);
    });

    return $root;
}
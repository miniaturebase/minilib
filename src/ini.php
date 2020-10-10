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
        $input = \parse_ini_file($source, true, \INI_SCANNER_TYPED);
    } else if (\is_array($source)) {
        $input = $source;
    }

    if (\is_null($input)) {
        throw new InvalidArgumentException(\sprintf('Argument 1 passed to %s must be of the type %s, %s given', __FUNCTION__, 'array|string', \gettype($source)));
    }
    
    $root = [];
    $toArray = static function (string $value, $transformer): array {
        return map(\explode(',', (\trim(\trim($value), '[]'))), static function (string $item) use ($transformer) {
            return transform(\trim($item), $transformer);
        });
    };
    $transformer = static function ($value) use (&$transformer, $toArray) {
        if (\is_array($value)) {
            return ini($value);
        }
        
        $isNumeric = \is_numeric($value);

        if ($isNumeric and false !== \stristr((string) $value, '.')) {
            return (float) $value;
        }

        if ($isNumeric) {
            return (int) $value;
        }
        
        if (\is_string($value)) {
            if ('true' === $value) {
                return true;
            }
            
            if ('false' === $value) {
                return false;
            }
            
            if ('null' === $value) {
                return null;
            }
            
            $chars = \str_split($value);
            
            if ('[]' === \trim(head($chars) ?? '') . \trim(tail($chars) ?? '')) {
                $value = \array_filter($toArray($value, $transformer), static function ($value): bool {
                    return !\is_null($value) and '' !== $value;
                });
            }

            return $value;
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
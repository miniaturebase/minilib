<?php

declare(strict_types = 1);

namespace Phelpers\Tests;

use function Phelpers\class_basename;

use Exception;

it('can parse the base class name from any string', function (
    string $expected, 
    $value
): void {
    expect(class_basename($value))->toBe($expected);
})->with([
    'class string name' => ['Classname', '\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname'],
    'class string name with trailing slash' => ['Classname', '\\Some\\Long\\Nested\\Namespace\\For\\A\\Classname\\'],
    'class instance' => ['Exception', new Exception],
    'empty string' => ['', ''],
    'blank string' => ['', '   '],
]);
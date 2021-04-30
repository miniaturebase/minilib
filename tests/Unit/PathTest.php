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

namespace Minibase\Tests\Unit;

use InvalidArgumentException;

use function Minibase\array_make;
use function Minibase\is_windows;

use function Minibase\path;
use const Minibase\PATHINFO_ABSOLUTE;
use const Minibase\PATHINFO_TRAILING;
use function Minibase\str_random;

it('joins things together', function (array $segments, string $delimiter): void {
    expect(path($segments, $delimiter))
        ->toContain($delimiter)
        ->not()
        ->toStartWith($delimiter)
        ->not()
        ->toEndWith($delimiter)
        ->toEqual(implode($delimiter, $segments));
})->with([
    'Windows, DOS' => [
        array_make(rand(2, 15), function (): string {
            return str_random(rand(1, 8));
        }),
        '\\',
    ],
    'Linux, Darwin' => [
        array_make(rand(2, 15), function (): string {
            return str_random(rand(1, 10));
        }),
        '/',
    ],
    'dot notation' => [
        array_make(rand(2, 15), function (): string {
            return str_random(rand(1, 10));
        }),
        '.',
    ],
]);

it('can make absolute paths')
    ->expect(path(['foo', 'bar', 'baz'], '/', PATHINFO_ABSOLUTE))
    ->toStartWith('/')
    ->not()
    ->toEndWith('/')
    ->toEqual('/foo/bar/baz');

it('can make trailing paths')
    ->expect(path(['foo', 'bar', 'baz'], '/', PATHINFO_TRAILING))
    ->not()
    ->toStartWith('/')
    ->toEndWith('/')
    ->toEqual('foo/bar/baz/');

test('blank path segments')
    ->expect(path(['  ', '', '  ']))
    ->toEqual('  /  ');

test('tilde expansion (section 2.6.1 of POSIX spec)')
    ->skip(is_windows(), 'Windows & DOS OSs do not use the tilde expansion as documented in section 2.6.1 of the POSIX spec')
    ->expect(path(['~', 'foo']))
    ->not()
    ->toContain('~')
    ->toEndWith('/foo')
    ->not()
    ->toStartWith('/foo')
    ->toStartWith('/');

test('windows OS drive detection for absolute paths')
    ->skip(!is_windows(), 'Unix and other non-Windows or DOS based OSs do not use drive letter assignment')
    ->expect(path(['some', 'path'], \DIRECTORY_SEPARATOR, PATHINFO_ABSOLUTE))
    ->toStartWith('C:\\') // NOTE: will need to setup tests on windows to see wtf this even will be
    ->not()
    ->toEndWith('C:\\')
    ->toEndWith('\\path');

it('throws errors when delimiters exceed 1 byte', function (): void {
    path([], str_random(rand(2, 16)));
})->throws(InvalidArgumentException::class);

it('throws errors when delimiters are blank', function (): void {
    path([], '');
})->throws(InvalidArgumentException::class)->with([
    'empty string' => [''],
    'white space'  => [str_repeat(' ', rand(1, 100))],
]);

# PHelPers

[![Latest Stable Version](https://poser.pugx.org/jordanbrauer/phelpers/version?format=flat-square)](https://packagist.org/packages/jordanbrauer/phelpers)
[![Latest Unstable Version](https://poser.pugx.org/jordanbrauer/phelpers/v/unstable?format=flat-square)](//packagist.org/packages/jordanbrauer/phelpers)
[![Test Status](https://img.shields.io/github/workflow/status/jordanbrauer/phelpers/CI?label=tests&style=flat-square)](https://github.com/jordanbrauer/phelpers/actions?query=workflow%3ACI)

[![Maintenance](https://img.shields.io/maintenance/yes/2020.svg?style=flat-square)](https://github.com/jordanbrauer/phelpers)
[![Packagist](https://img.shields.io/packagist/dt/jordanbrauer/phelpers.svg?style=flat-square)](https://packagist.org/packages/jordanbrauer/phelpers)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/jordanbrauer/phelpers.svg?style=flat-square)](https://secure.php.net/releases/)
[![composer.lock available](https://poser.pugx.org/jordanbrauer/phelpers/composerlock?format=flat-square)](https://packagist.org/packages/jordanbrauer/phelpers)
[![license](https://img.shields.io/github/license/jordanbrauer/phelpers.svg?style=flat-square)](https://github.com/jordanbrauer/phelpers/blob/master/LICENSE)

<br />

Collection of random helper QoLfunctions for PHP.

```php
use function Phelpers{append, head, tail};

$sequence = '1,2,3';
$sequence = append(4, $sequence, ',');

echo $sequence; # (string) 1,2,3,4

$list = [1, 2, 3];
$list = append(4, $list);

echo head($list); # (int) 1
echo tail($list); # (int) 4
```

### Try Me

If you would like to play around with the functions, simply boot up the REPL packaged with the repository!

```bash
$ php play
```

### Array Functions

* `append`
* `array_make`
* `generate`
* `head`
* `is_associative`
* `only`
* `prepend`
* `tail`
* `wrap`

### Number Functions

* `between`
* `ordinal`
* `random_float`

### Object Functions

_N/A_

### String Functions

* `append`
* `camel_case`
* `class_basename`
* `kebab_case`
* `pascal_case`
* `prepend`
* `snake_case`
* `str_random`

### Miscellaneous Functions

* `blank`
* `retry`
* `swap`
* `tap`
* `transform`
* `value`
* `with`

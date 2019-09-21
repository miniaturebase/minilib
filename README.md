# PHelPers

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

### Array Functions

* `append`
* `array_make`
* `generate`
* `head`
* `is_associative`
* `only`
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

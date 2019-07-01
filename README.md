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

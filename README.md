# Minilib

[![Latest Stable Version](https://poser.pugx.org/minibase-app/minilib/version?format=flat-square)](https://packagist.org/packages/minibase-app/minilib)
[![Latest Unstable Version](https://poser.pugx.org/minibase-app/minilib/v/unstable?format=flat-square)](//packagist.org/packages/minibase-app/minilib)
[![Test Status](https://img.shields.io/github/workflow/status/minibase-app/minilib/CI?label=tests&style=flat-square)](https://github.com/minibase-app/minilib/actions?query=workflow%3ACI)

[![Maintenance](https://img.shields.io/maintenance/yes/2021.svg?style=flat-square)](https://github.com/minibase-app/minilib)
[![Packagist](https://img.shields.io/packagist/dt/minibase-app/minilib.svg?style=flat-square)](https://packagist.org/packages/minibase-app/minilib)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/minibase-app/minilib.svg?style=flat-square)](https://secure.php.net/releases/)
[![composer.lock available](https://poser.pugx.org/minibase-app/minilib/composerlock?format=flat-square)](https://packagist.org/packages/minibase-app/minilib)
[![license](https://img.shields.io/github/license/minibase-app/minilib.svg?style=flat-square)](https://github.com/minibase-app/minilib/blob/master/LICENSE)

<br />

A collection of random, quality of life functions for PHP – a sort of kitchen-sink _toolbox_.

## Requirements

There are not many requirements for this library; infact, the only true requirement is PHP, but if you plan to contribute, having GNU Make installed will make for nicer dev experience than without.

| Requirement      | Version |
|:-----------------|:-------:|
| PHP              | `^7.2`  |
| Make (dev only)  | `^3.81` |

## Installation

Nothing much to do but require the library in your own project's composer dependencies!

```bash
$ composer require minibase-app/minilib
```

Once you have the library installed, head over to the list of [**available functions**](#Available-Functions) to shop around.

## Development

1. Start by cloning the project to your own machine.
1. Move yourself into the newly cloned repository directory.
1. Run make to install dev dependencies.

```bash
$ git clone https://github.com/minibase-app/minilib.git \
    && cd ./minilib \
    && make vendor \
    && make;
```

### Usage 

As mentioned in the _Requirements_ section of this document, having GNU Make installed on your system will make for nice development experience while contributing. To get started, run Make without any targets or arguments:

```bash
$ make
```

And you will be greeted with the list of targets for this project!

```
Usage:
  make [target] [arg="val"...]

Targets:
  analysis        Run analysis
  help            Show this help message
  repl            Start a REPL instance and interact with the library
  test            Run tests
  vendor          Install vendor dependencies
```

### Try Me

If you're not sure that this library is right for you, can "try before you buy". Start by [installing the project for development](#Development), and then simply boot up [the **REPL**](https://github.com/bobthecow/psysh) packaged with the repository!

```bash
$ make repl
```

Using the functions is easy – just make sure that you preface your functions with the projects namespace first.

```php
λ Minibase\is_console() # true
λ Minibase\is_web()     # false
```

## Available Functions

_This is a non-exhaustive list – see the `src/` directory for a full list!_

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

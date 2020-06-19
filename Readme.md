# Cmark GFM for PHP

![PHP Composer](https://github.com/jayay/cmark-gfm-php/workflows/PHP%20Composer/badge.svg)

This library provides a PHP wrapper for [cmark-gfm](https://github.com/github/cmark-gfm), Github's Markdown parser.

## Requirements

* GNU Make
* cmake
* a working C compiler such as `gcc` or `clang`
* the C preprocessor `cpp`
* PHP >= 7.4
* composer

## Usage

Checkout this repository with submodules (`composer require` is not possible yet) and compile the library:

```
git clone --recursive https://github.com/jayay/cmark-gfm-php
cd cmark-gfm-php
composer compile
```

Now set up opcache to preload the preload.php on startup by adding this line in your `php.ini`:

```
opcache.preload=/path/to/cmark-gfm-php/preload.php
```

Setting this using the `-d` argument to PHP works as well. If you have your own preload.php, the one from this repository should be included inside that one.

## Running the tests

This project uses PHPUnit to run the tests, but needs the `opcache.preload` option to be set, which is wrapped in the `composer test` script.

## Example

Render a markdown string to HTML:

```php
<?php declare(strict_types=1);

use \jayay\CommonMarkGithub\MarkdownParser;

$parser = new MarkdownParser();
echo $parser->parse_string('
# Hello from Markdown

This is a paragraph in Markdown.

* An element of a list
* A second one

<a href="/">HTML will be removed</a>');
```

# License

This project was released under the BSD-3-Clause. See [LICENSE](LICENSE) document in this project.
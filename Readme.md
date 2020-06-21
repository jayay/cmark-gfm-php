# Cmark GFM for PHP

![PHP Composer](https://github.com/jayay/cmark-gfm-php/workflows/PHP%20Composer/badge.svg)

This library provides a PHP wrapper for [cmark-gfm](https://github.com/github/cmark-gfm), Github's Markdown parser.

## Requirements

The following binaries need to be accessible in within `$PATH`:

* `git`
* GNU Make (`make`)
* [CMake](https://cmake.org/)
* a working C compiler such as `gcc` or `clang`
* the C preprocessor `cpp`
* PHP >= 7.4
* [Composer](https://getcomposer.org/)

## Usage

Make sure your system meets the above mentioned requirements. Then, install this library using Composer from git and add the `post-install-cmd` and `post-update-cmd` hooks:

```
"require": {
    "jayay/cmark-gfm-php": "dev-master"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/jayay/cmark-gfm-php.git"
    }
],
"scripts": {
    "post-install-cmd": "cd vendor/jayay/cmark-gfm-php && git submodule update --init && composer compile",
    "post-update-cmd" : "cd vendor/jayay/cmark-gfm-php && git submodule update --init && composer compile"
}
```

⚠️ Warning ⚠️: The absolute path to the library will be written into the new header, which means the `composer install` has to be executed on every machine that relies on this package!

Now set up opcache to preload the preload.php on startup by adding this line in your `php.ini`:

```
opcache.preload=/path/to/project/vendor/jayay/cmark-gfm-php/preload.php
```

Setting this using the `-d` argument to PHP works as well. If you have your own preload.php, the one from this repository should be included inside that one by using `opcache_preload_file('vendor/jayay/cmark-gfm-php/preload.php');`.

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

## Running the tests

This project uses PHPUnit to run the tests, but needs the `opcache.preload` option to be set, which is wrapped in the `composer test` script.

```
git clone --recursive https://github.com/jayay/cmark-gfm-php
cd cmark-gfm-php
composer compile
composer test
```

# License

This project was released under the BSD-3-Clause. See [LICENSE](LICENSE) document in this project.
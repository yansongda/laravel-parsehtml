<h1 align="center">Laravel-Parsehtml</h1>

<p align="center">
<a href="https://scrutinizer-ci.com/g/yansongda/laravel-parsehtml/?branch=master"><img src="https://scrutinizer-ci.com/g/yansongda/laravel-parsehtml/badges/quality-score.png?b=master" alt="Scrutinizer Code Quality"></a>
<a href="https://scrutinizer-ci.com/g/yansongda/laravel-parsehtml/build-status/master"><img src="https://scrutinizer-ci.com/g/yansongda/laravel-parsehtml/badges/build.png?b=master" alt="Build Status"></a>
<a href="https://packagist.org/packages/yansongda/laravel-parsehtml"><img src="https://poser.pugx.org/yansongda/laravel-parsehtml/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/yansongda/laravel-parsehtml"><img src="https://poser.pugx.org/yansongda/laravel-parsehtml/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/yansongda/laravel-parsehtml"><img src="https://poser.pugx.org/yansongda/laravel-parsehtml/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/yansongda/laravel-parsehtml"><img src="https://poser.pugx.org/yansongda/laravel-parsehtml/license" alt="License"></a>
</p>

This Package depends on [league/html-to-markdown](https://github.com/thephpleague/html-to-markdown)  

## Installation

```shell
$ composer require yansongda/laravel-parsehtml
```

### Add service provider

```php
<?php

Yansongda\LaravelParsedown\ParsehtmlServiceProvider::class,
```

### Add alias

```php
<?php

'LaravelParsehtml' => Yansongda\LaravelParsehtml\Facades\Parsehtml::class,
```

### Config(OPTION)

```shell
$ php artisan vendor:publish --provider="Yansongda\\LaravelParsedown\\ParsehtmlServiceProvider" --tag=config
```

|     config    |            desc            |
| :-----------: | :------------------------: |
| strip_tags | strip HTML tags that don't have a Markdown equivalent      |
| remove_nodes | strip tags and their content      |
| italic_style  |    |
| bold_style |        |
| hard_break    |   |

Reference: [league/html-to-markdown](https://github.com/thephpleague/html-to-markdown)

## Usage

### Using blade
```php
<?php

@parsehtml('<h2>blablabla</h2>');
```

### Using Helper
```php
<?php

{{ parsehtml('<h2>blablabla</h2>') }}
```

## License

MIT
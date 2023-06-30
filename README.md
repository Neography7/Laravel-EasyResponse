# Introduction

[![Latest Version on Packagist](https://img.shields.io/packagist/v/neography7/easy-response.svg?style=flat-square)](https://packagist.org/packages/neography7/easy-response)
[![Total Downloads](https://img.shields.io/packagist/dt/neography7/easy-response.svg?style=flat-square)](https://packagist.org/packages/neography7/easy-response)
![GitHub Actions](https://github.com/neography7/easy-response/actions/workflows/main.yml/badge.svg)

Easy Response allows you to create REST Callbacks in an easy way. This package has 3 ways to create callbacks which you can use what you want. But if it's suitable for you, the helpers will be more easy and clean. 

This package follows PSR-2 and PSR-4 standards.

# Installation

You can install the package via composer:

```bash
composer require neography7/easy-response
```

# Usage

There are three ways to use this package but using it with the helpers is recommended. 

## 1) Helpers

### easySuccess helper 

```php
easySuccess( message, title = null, data = null);
```

```php
easySuccess(
    message: 'Test message',
    title: 'Test Title',
    data: [
        "key" => "value"
    ]
);
```

or like this

```php
easySuccess('Test message', 'Test Title', [ "key" => "value" ]);
```

### easyError helper 

```php
easyError( message, title = null, code = null, data = null);
```

```php
easyError(
    message: 'Test message',
    title: 'Test Title',
    code: 400,
    data: [
        "key" => "value"
    ]
);
```

or like this

```php
easyError('Test message', 'Test Title', 400, [ "key" => "value" ]);
```

## 2) Class

Firstly import the class, then create an instance.

```
use Neography7\EasyResponse\EasyResponse;

$callback = new EasyResponse;
```

You can add message, title, success, code, data or add custom key with chaining methods.

```
$callback->title("Title")
            ->message("Message")
            ->success("true")
            ->response();
```
The response method is going to make it all together into an array then it responds as a json callback. If success is given as true, the response code will be 200. Additionally, you can add data, code, and custom key-value with the chaining methods.

```
$callback->title("Error Title")
            ->message("Error message.")
            ->success("false")
            ->code(404)
            ->data["key" => value]
            ->addKey("key", value)
            ->response();
```
If you want to remove the key that you added, you can use this method.


```
$callback->removeKey("key");
```

## 3) Static Class

Firstly import the class that initializes EasyResponse, then call the success or error method that you want to use.

```
use Neography7\EasyResponse\EA;

$callbackSuccess = EA::success($message, $title = null);
$callbackError = EA::error($message, $title = null, $code = null);
```

You must to call response method after use.

```
$callback EA::success("Message", "Title")->response();
```

# Testing

I recommend testbench with "nunomaduro/collision" for testing.

```bash
php vendor/bin/testbench package:test
```

# Roadmap

* [x] The package were created
* [ ] More helpers function will be added
* [ ] Initial callbacks messages and their translations will be added

# Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

# Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

# Security

If you discover any security related issues, please email ilkerakyel97@gmail.com instead of using the issue tracker.

# Credits

-   [İlker Akyel](https://github.com/neography7)
-   [All Contributors](../../contributors)

# License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

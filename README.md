# Package that handle laravel expection.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tinno/filament-exception-handler.svg?style=flat-square)](https://packagist.org/packages/tinno/filament-exception-handler)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tinno/filament-exception-handler/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tinno/filament-exception-handler/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tinno/filament-exception-handler/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tinno/filament-exception-handler/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tinno/filament-exception-handler.svg?style=flat-square)](https://packagist.org/packages/tinno/filament-exception-handler)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tinno/filament-exception-handler
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-exception-handler-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-exception-handler-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-exception-handler-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentExceptionHandler = new Tinno\FilamentExceptionHandler();
echo $filamentExceptionHandler->echoPhrase('Hello, Tinno!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tinno](https://github.com/Tinnnooo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

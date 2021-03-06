# Laravel OPcache

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/laravel-opcache.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-opcache)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/laravel-opcache.svg?style=flat-square)](https://packagist.org/packages/appstract/laravel-opcache)

This package contains some useful Artisan commands to work with PHP OPcache.

#### If you want to learn more about OPcache and what it can do for your Laravel app, you can [read the article on Medium](https://medium.com/appstract/make-your-laravel-app-fly-with-php-opcache-9948db2a5f93#.bjrpj4h1c).

## Requirements
This package requires Laravel 5.5 or newer. For older Laravel versions (5.1 or newer), you can use version 1.3.0

## Installation

You can install the package via Composer:

``` bash
composer require appstract/laravel-opcache
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Appstract\Opcache\OpcacheServiceProvider" --tag="config"
```

### For Lumen:
```php
// bootstrap/app.php
$app->register(Appstract\Opcache\OpcacheServiceProvider::class);
$app->configure('opcache');

// config/app.php (Only if you already have a custom app.php file)
'url' => env('APP_URL'),

// config/opcache.php
'url' => env('OPCACHE_URL', env('APP_URL')),
'verify_ssl' => true,
'headers' => [],
'directories' => [
    base_path('app'),
    base_path('bootstrap'),
    base_path('public'),
    base_path('routes'),
    base_path('vendor/appstract'),
    base_path('vendor/composer'),
    base_path('vendor/laravel/lumen-framework'),
    base_path('vendor/illuminate'),
]
```
Make sure your APP_URL is set correctly in .env.
If you want to set a different url to call the OPcache routes (for use with a load balancer for example),
you can set OPCACHE_URL.

You will also need an encryption key set in your `.env` file. Since Lumen does not have a artisan generate command, you can create a tempoary route to generate one for you.

```php
$router->get('/key', function() {
    return 'base64:'.base64_encode(random_bytes(32));  
});
```

Put the results in your .env file:
```
APP_KEY=
```

## Usage
Login to your server/vm and run one of the commands.
##### Requests are only excepted from the same IP as the server IP.

Clear OPcache:
``` bash
php artisan opcache:clear
```

Show OPcache config:
``` bash
php artisan opcache:config
```

Show OPcache status:
``` bash
php artisan opcache:status
```

Pre-compile your application code:
``` bash
php artisan opcache:optimize
```

Programmatic usage:

```php
use Appstract\Opcache\OpcacheFacade as OPcache;

...

OPcache::clear();
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/laravel-opcache/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. We create (open source) tools for webdevelopment and write about related subjects on [Medium](https://medium.com/appstract). You can [follow us on Twitter](https://twitter.com/teamappstract), [buy us a beer](https://www.paypal.me/teamappstract/10) or [support us on Patreon](https://www.patreon.com/appstract).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

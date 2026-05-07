# Nova Poshta API SDK for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sashalenz/nova-poshta-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-poshta-api)
[![Total Downloads](https://img.shields.io/packagist/dt/sashalenz/nova-poshta-api.svg?style=flat-square)](https://packagist.org/packages/sashalenz/nova-poshta-api)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require sashalenz/nova-poshta-api
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="nova-poshta-api-config"
```

This is the contents of the published config file:

```php
return [
    'api_key' => env('NOVA_POSHTA_API_KEY'),    
];
```

## Usage

```php

```

## Error handling

Every request goes through `Request::make()`, which raises one of two
exception types — both extending `NovaPoshtaException`:

| Exception | When | Typical use |
|---|---|---|
| `NovaPoshtaApiUnavailableException` | NP itself is unreachable: cURL connection reset, DNS failure, timeout, or any 5xx response | Treat as a transient infrastructure issue — retry later, render an empty/cached fallback, alert the on-call channel separately from code errors |
| `NovaPoshtaException` | NP returned an HTTP 4xx, or a 200 response whose body contained an `errors[]` array / `success: false` | Application-level error — the request itself is the problem (bad TTN, missing API key, malformed payload). Surface to the user / log and move on |

Existing `catch (NovaPoshtaException)` sites pick up the unavailable
subclass automatically, so legacy code keeps working. Catch the
subclass first when you need to react differently to downtime:

```php
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaApiUnavailableException;
use Sashalenz\NovaPoshtaApi\Exceptions\NovaPoshtaException;

try {
    $cities = Address::make()->getCities($request);
} catch (NovaPoshtaApiUnavailableException $e) {
    // NP is down — fall back to cached results, suppress UI noise
    return $cachedCities;
} catch (NovaPoshtaException $e) {
    // Something is wrong with our request — log and surface to the user
    report($e);
    return collect();
}
```

For Bugsnag / Sentry, route `NovaPoshtaApiUnavailableException` to a
lower severity (e.g. `warning`) so the dashboard isn't flooded during
NP's evening flapping windows:

```php
// bootstrap/app.php — Laravel 11+
->withExceptions(fn (Exceptions $exceptions) => $exceptions
    ->report(function (NovaPoshtaApiUnavailableException $e) {
        Bugsnag::notifyException($e, fn ($report) => $report->setSeverity('warning'));
        return false; // skip default reporting
    })
    ->dontReport([NovaPoshtaException::class])
)
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Oleksandr Petrovskyi](https://github.com/sashalenz)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

# Laravel ReCaptcha

## Install

```bash
composer require missael-anda/laravel-recaptcha@dev
```

Extended validation rule `recaptcha`.

```php
MissaelAnda\ReCaptcha\Facade\ReCaptcha::validate(string $secret)
```

### Config file

```php
return [
    'enabled' => env('RECAPTCHA_ENABLED', true),

    'key' => env('RECAPTCHA_KEY'),

    'timeout' => env('RECAPTCHA_TIMEOUT'),
];
```

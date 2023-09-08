<?php

namespace MissaelAnda\ReCaptcha\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool validate(string $recaptcha)
 * @method static bool invoke()
 * @method static \MissaelAnda\ReCaptcha\ReCaptcha setEnabled(bool $enabled = true)
 * @method static bool enabled()
 */
class ReCaptcha extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'recaptcha';
    }
}

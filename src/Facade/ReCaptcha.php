<?php

namespace MissaelAnda\ReCaptcha\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool validate(string $recaptcha)
 * @method static bool invoke()
 * @method static void setEnabled(bool $enabled = true)
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

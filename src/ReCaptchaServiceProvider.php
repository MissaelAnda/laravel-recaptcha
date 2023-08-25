<?php

namespace MissaelAnda\ReCaptcha;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use MissaelAnda\ReCaptcha\Facade\ReCaptcha as ReCaptchaFacade;

class ReCaptchaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/whatsapp.php', 'whatsapp');

        $this->app->singleton('recaptcha', ReCaptcha::class);
    }

    public function boot()
    {
        $this->publishConfig();
        $this->extendValidator();
    }

    protected function extendValidator()
    {
        Validator::extendImplicit('recaptcha', function ($attribute, $value) {
            return ReCaptchaFacade::validate($value);
        }, trans('Invalid recaptcha secret.'));
    }

    protected function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/whatsapp.php' => $this->app->configPath('whatsapp.php'),
            ], 'config');
        }
    }

    public function provides()
    {
        return ['recaptcha'];
    }
}

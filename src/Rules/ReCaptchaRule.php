<?php

namespace MissaelAnda\ReCaptcha\Rules;

use Illuminate\Contracts\Validation\InvokableRule;
use MissaelAnda\ReCaptcha\Facade\ReCaptcha;

class ReCaptchaRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke(string $attribute, mixed $value, \Closure $fail): void
    {
        if (ReCaptcha::validate($value)) {
            $fail(trans('Invalid recaptcha secret.'));
        }
    }
}

<?php

namespace MissaelAnda\ReCaptcha;

use Illuminate\Support\Facades\Http;

class ReCaptcha
{
    public const URL = 'https://www.google.com/recaptcha/api/siteverify';

    protected ?string $key;

    protected bool $enabled;

    public function __construct()
    {
        $this->enabled = (bool)config('recaptcha.enabled', true);
        $this->key = config('recaptcha.key');

        if ($this->enabled && !$this->key) {
            throw new \Exception('The ReCaptcha key is not set.');
        }
    }

    public function setEnabled(bool $enabled = true)
    {
        $this->enabled = $enabled;
    }

    public function validate(?string $recaptcha): bool
    {
        if (!$this->enabled) {
            return true;
        }

        if ($recaptcha == '') {
            return false;
        }

        try {
            $response = Http::asMultipart()->timeout(config('recaptcha.timeout', 10))->post(self::URL, [
                'secret' => $this->key,
                'response' => $recaptcha,
                'remoteip' => request()->ip(),
            ]);
        } catch (\Exception) {
            return false;
        }

        return (bool)$response->json('success', false);
    }

    public function invoke(): bool
    {
        return $this->validate(request('recaptcha_secret'));
    }
}

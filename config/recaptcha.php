<?php

return [
    'enabled' => env('RECAPTCHA_ENABLED', true),

    'key' => env('RECAPTCHA_KEY'),

    'timeout' => env('RECAPTCHA_TIMEOUT', 10),
];

<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'dhl' => [
        'username' => env('DHL_USERNAME', 'apH3yT8xI4aT6d'),
        'password' => env('DHL_PASSWORD', 'A@9nB#4nM$1hV!6p'),
        'account_number' => env('DHL_ACCOUNT_NUMBER', ''),
        'endpoint' => env('DHL_ENDPOINT', 'https://wsbexpress.dhl.com:443/sndpt/expressRateBook'),
    ],

    'cybersource' => [
        'access_key' => env('CYBERSOURCE_ACCESS_KEY', ''),
        'profile_id' => env('CYBERSOURCE_PROFILE_ID', ''),
        'secret_key' => env('CYBERSOURCE_SECRET_KEY', ''),
        'endpoint'   => env('CYBERSOURCE_ENDPOINT', 'https://secureacceptance.cybersource.com/pay'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID', ''),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', ''),
        'redirect'      => env('GOOGLE_REDIRECT_URI', env('APP_URL', 'http://localhost:8000') . '/auth/google/callback'),
    ],

];

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
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'paytm-wallet' => [
        'env' => env('PAYTM_ENVIRONMENT', 'local'),
        'merchant_id' => env('PAYTM_MERCHANT_ID', 'fallback_mid'),
        'merchant_key' => env('PAYTM_MERCHANT_KEY', 'fallback_key'),
        'merchant_website' => env('PAYTM_MERCHANT_WEBSITE', 'fallback_site'),
        'channel' => env('PAYTM_CHANNEL', 'fallback_channel'),
        'industry_type' => env('PAYTM_INDUSTRY_TYPE', 'fallback_industry'),
    ],

];

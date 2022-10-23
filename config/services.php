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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'cloudpayments' => [
        'public_key' => env('CLOUDPAYMENTS_PUBLIC_KEY'),
        'private_key' => env('CLOUDPAYMENTS_PRIVATE_KEY'),
        'api_url' => env('CLOUDPAYMENTS_API_URL', 'https://api.cloudpayments.ru/'),
        'subscribe_start_amount' => env('CLOUDPAYMENTS_SUBSCRIBE_START_AMOUNT', 1),
        'currency' => env('CLOUDPAYMENTS_CURRENCY', 'RUB'),
        'subscribe_start_free_days' => env('CLOUDPAYMENTS_SUBSCRIBE_START_FREE_DAYS', 3),
        'split_timeout' => env('CLOUDPAYMENTS_SPLIT_TIMEOUT', 60),
    ],

    'binom' => [
        'subscribe_url' => env('BINOM_SUBSCRIBE_URL', 'https://tracksh.online/pbprokla.php?clickid=%s&iduser=%s&actiontype=%s&actionname=cpl'),
        'pay_url' => env('BINOM_PAY_URL', 'https://tracksh.online/pbprokla.php?clickid=%s&iduser=%s&actiontype=%s&actionname=cpa&amount=%s'),
    ]

];

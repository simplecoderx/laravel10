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

    'github' => [
        'client_id' => '3e728c6c583de7020c6a',
        'client_secret' => '74da716be3222933f021bd1c3f347f0003b6cda7',
        'redirect' => 'http://127.0.0.1:8000/auth/github/callback',
    ],

    'google' => [
        'client_id' => '372632389003-r9843mkneql0gbt0mnbbcabtovu2m07a.apps.googleusercontent.com',
        'client_secret' =>'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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '225457773608794',
        'client_secret' => '5e1beb549e7f97332c06332abe99edea',
        'redirect' => 'http://127.0.0.1:8000/auth/facebook/callback',
    ],
];

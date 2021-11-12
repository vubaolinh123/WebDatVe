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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '492481953658-bqn7thf0134hovh1fv2mn0t4leanincu.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback' ,
    ],
    'github' => [
        'client_id' => 'Iv1.296a578be6f74efb',
        'client_secret' => 'a5cc96fca3f4998027a42537d62e65d829d6349a',
        'redirect' => 'http://127.0.0.1:8000/callback-github' ,
    ]
];

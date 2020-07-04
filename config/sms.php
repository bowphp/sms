<?php

return [
    /**
     * The define driver
     */
    'driver' => app_env('SMS_DRIVER', 'osms'),

    /**
     * The sender number
     */
    'from' => app_env('SMS_FROM_NUMBER'),

    /**
     * Nexmo SMS
     *
     * Credentials
     */
    'nexmo' => [
        'key' => app_env('NEXMO_API'),
        'secret' => app_env('NEXMO_SECRET'),
        'ttl' => app_env('NEXMO_TTL'),
        'brand' => app_env('NEXMO_BRAND')
    ],

    /**
     * Orange SMS API
     *
     * Credentials
     */
    'osms' => [
        'key' => app_env('OSMS_API'),
        'secret' => app_env('OSMS_SECRET'),
        'brand' => app_env('OSMS_BRAND_NAME'),
    ],

    /**
     * MonTexto SMS API
     *
     * Credentials
     */
    'montexto' => [
        'email' => app_env('MONTEXTO_EMAIL'),
        'password' => app_env('MONTEXTO_PASSWORD'),
        'brand' => app_env('MONTEXTO_SENDERNAME'),
    ],

    /**
     * MTNSMSCLOUD API
     *
     * Credentials
     */
    'mtnsmscloud' => [
        'sender_id' => app_env('MTNSMSCLOUD_SENDER_ID'),
        'token' => app_env('MTNSMSCLOUD_TOKEN'),
        'brand' => app_env('MTNSMSCLOUD_BRAND_NAME'),
    ]
];

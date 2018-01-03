<?php

return [
    /**
     * The definte driver
     */
    'driver' => env('SMS_DRIVER'),

    /**
     * The brand name of
     */
    'from' => env('FROM_NUMBER'),

    /**
     * Nexmo SMS
     *
     * Credentials
     */
    'nexmo' => [
        'key' => env('NEXMO_API'),
        'secret' => env('NEXMO_SECRET'),
        'ttl' => env('NEXMO_TTL'),
        'brand' => env('NEXMO_BRAND')
    ];

    /**
     * Orange SMS API
     *
     * Credentials
     */
    'osms' => [
        'key' => env('OSMS_API'),
        'secret' => env('OSMS_SECRET'),
    ];
];

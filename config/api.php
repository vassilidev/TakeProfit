<?php

/**
 * Return all the APIs keys.
 */
return [
    'apilayer'      => [
        'api_key' => env('APILAYER_API_KEY'),
        'base'    => 'USD',
    ],
    'coinmarketcap' => [
        'api_key' => env('COINMARKETCAP_API_KEY'),
    ],
];
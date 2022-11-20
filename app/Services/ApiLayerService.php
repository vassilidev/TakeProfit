<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class ApiLayerService
{
    /**
     * @return PendingRequest
     */
    public function getClient(): PendingRequest
    {
        return Http::withHeaders([
            'apikey' => config('api.apilayer.api_key'),
        ])->baseUrl('https://api.apilayer.com/currency_data');
    }
}
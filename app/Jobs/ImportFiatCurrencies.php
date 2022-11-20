<?php

namespace App\Jobs;

use App\Models\Currency;
use App\Services\ApiLayerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportFiatCurrencies implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @param ApiLayerService $apiLayerService
     *
     * @return void
     */
    public function handle(ApiLayerService $apiLayerService): void
    {
        $client = $apiLayerService->getClient();
        $fiatCurrencies = $client->get('/list')->collect();

        foreach ($fiatCurrencies['currencies'] as $fiatSymbol => $fiatName) {
            Currency::firstOrCreate([
                'symbol' => $fiatSymbol,
            ], [
                'name' => $fiatName,
                'type' => 'fiat',
            ]);
        }
    }
}

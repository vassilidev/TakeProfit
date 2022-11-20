<?php

namespace App\Jobs;

use App\Models\Currency;
use App\Services\ApiLayerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ImportLatestFiatValues implements ShouldQueue
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

        $base = config('api.apilayer.base');

        $response = $client
            ->get('/live', ['source' => config('api.apilayer.base')])
            ->collect();

        $date = Carbon::parse($response->get('timestamp'));

        foreach ($response->get('quotes') as $pairSymbol => $quote) {
            $fiatSymbol = Str::remove($base, $pairSymbol);

            $currency = Currency::whereSymbol($fiatSymbol)->firstOrFail();

            $currency->values()->create([
                'value' => $quote,
                'date'  => $date,
            ]);
        }
    }
}

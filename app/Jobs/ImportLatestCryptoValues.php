<?php

namespace App\Jobs;

use App\Models\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class ImportLatestCryptoValues implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $client = Http::withHeaders([
            'X-CMC_PRO_API_KEY' => '5cc92279-e300-44a0-8ce8-75b711cb30b0',
        ]);

        $response = $client->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest')->collect();

        $status = $response['status'];
        $data = $response['data'];

        $date = Carbon::parse($status['timestamp']);

        foreach ($data as $crypto) {
            $currency = Currency::query()->firstOrCreate(['symbol' => $crypto['symbol']], [
                'name' => $crypto['name'],
                'type' => 'crypto',
            ]);

            $currency->values()->create([
                'value' => $crypto['quote']['USD']['price'],
                'date'  => $date,
            ]);
        }
    }
}

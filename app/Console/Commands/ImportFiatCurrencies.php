<?php

namespace App\Console\Commands;

use App\Jobs\ImportFiatCurrencies as ImportFiatCurrenciesJob;
use Illuminate\Console\Command;

class ImportFiatCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:fiat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the list of all fiat supported.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        ImportFiatCurrenciesJob::dispatch();

        return self::SUCCESS;
    }
}

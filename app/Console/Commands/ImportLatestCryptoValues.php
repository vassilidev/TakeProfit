<?php

namespace App\Console\Commands;

use App\Jobs\ImportLatestCryptoValues as ImportLatestCryptoValuesJob;
use Illuminate\Console\Command;

class ImportLatestCryptoValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:latest:crypto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import latest crypto currencies values from APIs.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        ImportLatestCryptoValuesJob::dispatch();

        return self::SUCCESS;
    }
}

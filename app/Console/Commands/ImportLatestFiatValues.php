<?php

namespace App\Console\Commands;

use App\Jobs\ImportLatestFiatValues as ImportLatestFiatValuesJob;
use Illuminate\Console\Command;

class ImportLatestFiatValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:latest:fiat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import latest fiat currencies values from APIs.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        ImportLatestFiatValuesJob::dispatch();

        return self::SUCCESS;
    }
}

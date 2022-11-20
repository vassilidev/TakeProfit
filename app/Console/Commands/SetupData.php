<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call all the APIs the setup the database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->call('import:fiat');
        $this->call('import:latest:crypto');
        $this->call('import:latest:fiat');

        return self::SUCCESS;
    }
}

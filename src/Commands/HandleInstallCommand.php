<?php

namespace Tinno\FilamentExceptionHandler\Commands;

use Illuminate\Console\Command;

class HandleInstallCommand extends Command
{
    public $signature = 'exception-handler:install';

    public $description = 'Install and Setup Filament Exception Handler';

    public function handle(): int
    {
        $this->call('exceptions:install');

        return self::SUCCESS;
    }
}

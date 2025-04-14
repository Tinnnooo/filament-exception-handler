<?php

namespace Tinno\FilamentExceptionHandler\Commands;

use Illuminate\Console\Command;

class FilamentExceptionHandlerCommand extends Command
{
    public $signature = 'filament-exception-handler';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

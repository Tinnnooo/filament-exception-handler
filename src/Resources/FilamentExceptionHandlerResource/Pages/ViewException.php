<?php

namespace Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource\Pages;

use BezhanSalleh\FilamentExceptions\Trace\Parser;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;
use Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource;

class ViewException extends ViewRecord
{
    protected static string $resource = FilamentExceptionHandlerResource::class;

    protected static string $view = 'filament-exception-handler::view-exception';

    public function getFramesProperty()
    {
        /** @phpstan-ignore-next-line */
        $trace = "#0 {$this->record->file}({$this->record->line})\n";
        /** @phpstan-ignore-next-line */
        $frames = (new Parser($trace . $this->record->trace))->parse();
        array_pop($frames);

        return $frames;
    }

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

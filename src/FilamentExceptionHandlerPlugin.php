<?php

namespace Tinno\FilamentExceptionHandler;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource;

class FilamentExceptionHandlerPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-exception-handler';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            FilamentExceptionHandlerResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}

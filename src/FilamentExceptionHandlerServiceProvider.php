<?php

namespace Tinno\FilamentExceptionHandler;

use BezhanSalleh\FilamentExceptions\Facades\FilamentExceptions;
use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Throwable;
use Tinno\FilamentExceptionHandler\Commands\HandleInstallCommand;
use Tinno\FilamentExceptionHandler\Testing\TestsFilamentExceptionHandler;

class FilamentExceptionHandlerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-exception-handler';

    public static string $viewNamespace = 'filament-exception-handler';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands());

        // $configFileName = $package->shortName();

        // if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
        //     $package->hasConfigFile();
        // }

        // if (file_exists($package->basePath('/../database/migrations'))) {
        //     $package->hasMigrations($this->getMigrations());
        // }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        // FilamentAsset::register(
        //     $this->getAssets(),
        //     $this->getAssetPackageName()
        // );

        // FilamentAsset::registerScriptData(
        //     $this->getScriptData(),
        //     $this->getAssetPackageName()
        // );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        // if (app()->runningInConsole()) {
        //     foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
        //         $this->publishes([
        //             $file->getRealPath() => base_path("stubs/filament-exception-handler/{$file->getFilename()}"),
        //         ], 'filament-exception-handler-stubs');
        //     }
        // }

        // Testing
        // Testable::mixin(new TestsFilamentExceptionHandler);

        app(ExceptionHandler::class)->reportable(function (Throwable $e) {
            FilamentExceptions::report($e);
        });
    }

    protected function getAssetPackageName(): ?string
    {
        return 'tinno/filament-exception-handler';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-exception-handler', __DIR__ . '/../resources/dist/components/filament-exception-handler.js'),
            // Css::make('filament-exception-handler-styles', __DIR__ . '/../resources/dist/filament-exception-handler.css'),
            // Js::make('filament-exception-handler-scripts', __DIR__ . '/../resources/dist/filament-exception-handler.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            HandleInstallCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-exception-handler_table',
        ];
    }
}

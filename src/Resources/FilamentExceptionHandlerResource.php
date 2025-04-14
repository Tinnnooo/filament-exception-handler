<?php

namespace Tinno\FilamentExceptionHandler\Resources;

use BezhanSalleh\FilamentExceptions\Resources\ExceptionResource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource\Pages;

class FilamentExceptionHandlerResource extends ExceptionResource
{
    public static function getTimezone(): ?string
    {
        return null;
    }

    public static function getModelLabel(): string
    {
        return __('filament-exception-handler::exception-handler.labels.model');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-exception-handler::exception-handler.labels.model_plural');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('filament-exception-handler::exception-handler.labels.navigation_group');
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-exception-handler::exception-handler.labels.navigation');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->emptyStateIcon(config('filament-exceptions.icons.exception'))
            ->emptyStateHeading(__('filament-exception-handler::exception-handler.empty_list'))
            ->columns([
                TextColumn::make('method')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.method'))
                    ->badge()
                    ->colors([
                        'gray',
                        'success' => fn ($state): bool => $state === 'GET',
                        'primary' => fn ($state): bool => $state === 'POST',
                        'warning' => fn ($state): bool => $state === 'PUT', // @phpstan-ignore-line
                        'danger' => fn ($state): bool => $state === 'DELETE',
                        'warning' => fn ($state): bool => $state === 'PATCH',
                        'gray' => fn ($state): bool => $state === 'OPTIONS',

                    ])
                    ->searchable()
                    ->sortable(),
                TextColumn::make('path')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.path'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.type'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('code')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.code'))
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('ip')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.ip'))
                    ->badge()
                    ->extraAttributes(['class' => 'font-mono'])
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label(fn (): string => __('filament-exceptions::filament-exceptions.columns.occurred_at'))
                    ->sortable()
                    ->searchable()
                    ->dateTime(timezone: static::getTimezone())
                    ->since(timezone: static::getTimezone())
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                    ->color('primary'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageExceptions::route('/'),
            'view' => Pages\ViewException::route('/{record}'),
        ];
    }
}

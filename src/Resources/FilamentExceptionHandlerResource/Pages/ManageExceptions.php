<?php

namespace Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Tinno\FilamentExceptionHandler\Resources\FilamentExceptionHandlerResource;

class ManageExceptions extends ManageRecords
{
    protected static string $resource = FilamentExceptionHandlerResource::class;

    protected function paginateTableQuery(Builder $query): Paginator | CursorPaginator
    {
        return $query->fastPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }
}

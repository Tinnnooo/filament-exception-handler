<?php

namespace Tinno\FilamentExceptionHandler\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tinno\FilamentExceptionHandler\FilamentExceptionHandler
 */
class FilamentExceptionHandler extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Tinno\FilamentExceptionHandler\FilamentExceptionHandler::class;
    }
}

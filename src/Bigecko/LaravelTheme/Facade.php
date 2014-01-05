<?php namespace Bigecko\LaravelTheme;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{
    protected static function getFacadeAccessor() { return 'theme'; }
}

<?php

namespace Ashraam\Capjs;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string script()
 * @see \Ashraam\Capjs\Capjs
 */
class CapjsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'capjs';
    }
}

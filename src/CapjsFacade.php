<?php

namespace Ashraam\Capjs;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ashraam\Capjs\Skeleton\SkeletonClass
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

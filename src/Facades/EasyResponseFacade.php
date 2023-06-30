<?php

namespace Neography7\EasyResponse;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Neography7\EasyResponse\Skeleton\SkeletonClass
 */
class EasyResponseFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'easy-response';
    }
}

<?php

namespace Vedian\Grapebuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method __call(string $method, array $args)
 * @method src()
 * @method static root(string $path = null)
 * @method static resources(string $path = null) View
 * @method static models(string $path = null) View
 * @method static config(string $path = null) String
 * 
 * 
 * @see Vedian\Grapebuilder\Support\Path
 */
class Path extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor():  string
    {
        return \Vedian\Grapebuilder\Support\Path::class;
    }
}

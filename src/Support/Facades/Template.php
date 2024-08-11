<?php

namespace Vedian\Grapebuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vedian\Grapebuilder\Support\Template
 * @method Template __call(string $method, array $args) Vedian\Grapebuilder\Support\Template 
 * @method static \Vedian\Grapebuilder\Support\Template src()
 * @method static \Vedian\Grapebuilder\Support\Template header()
 * @method Vedian\Grapebuilder\Support\Template footer()
 * @method static \Vedian\Grapebuilder\Support\Template section()
 * @method static \Vedian\Grapebuilder\Support\Template exists()
 * @method \Vedian\Grapebuilder\Support\Template create()
 * @method static \Vedian\Grapebuilder\Support\Template edit()
 * @method static \Vedian\Grapebuilder\Support\Template show()
 * @method static \Vedian\Grapebuilder\Support\Template index()
 * @method static \Vedian\Grapebuilder\Support\Template get()
 * @method static view() \Vedian\Grapebuilder\Support\Template 
 * 
 */
class Template extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Vedian\Grapebuilder\Support\Template::class;
    }
}

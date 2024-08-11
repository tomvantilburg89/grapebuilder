<?php

namespace Vedian\Grapebuilder;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as IlluminateProvider;

use Vedian\Grapebuilder\Support\Facades\Path;

/**
 * @uses Vedian\Grapebuilder\Support\Traits\HasFacades
 * @author Tom van Tilburg
 * @copyright (c) 2023, Vedian
 * @license MIT
 * @version 1.0.0
 * @link https://github.com/vedian/grapebuilder
 * @since 1.0.0
 * @package Vedian\Grapebuilder
 */
class ServiceProvider extends IlluminateProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->bootable();
        $this->loading();
        $this->publishing();
    }

    protected function bootable()
    {
        Blade::componentNamespace('Grapebuilder\\View', 'Grapebuilder');
    }

protected function loading()
    {
        $this->loadMigrationsFrom(Path::migrations());
        $this->loadViewsFrom(Path::views(), 'Grapebuilder');
        $this->loadRoutesFrom(Path::routes('web'));
        $this->mergeConfigFrom(Path::config('grapebuilder'), 'grapebuilder');
    }

    protected function publishing()
    {
        $this->publishes([
            Path::migrations() => database_path('migrations'),
            Path::views() => resource_path('views/vendor/Grapebuilder'),
        ], 'grapebuilder-publish');
    }
}

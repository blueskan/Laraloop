<?php namespace Senemoglu\Laraloop\Facades;

use Illuminate\Support\Facades\Facade;

class Laraloop extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'senemoglu.laraloop'; }

}
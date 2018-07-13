<?php

namespace LucasQuinnGuru\Cerberus;

/**
 * This file is part of Cerberus,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package LucasQuinnGuru\Cerberus
 */

use Illuminate\Support\Facades\Facade;

class CerberusFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cerberus';
    }
}

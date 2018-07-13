<?php

namespace LucasQuinnGuru\Cerberus;

/**
 * This file is part of Cerberus,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package LucasQuinnGuru\Cerberus
 */

use LucasQuinnGuru\Cerberus\Contracts\CerberusPermissionInterface;
use LucasQuinnGuru\Cerberus\Traits\CerberusPermissionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CerberusPermission extends Model implements CerberusPermissionInterface
{
    use CerberusPermissionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('cerberus.permissions_table');
    }
}

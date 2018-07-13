<?php

namespace LucasQuinnGuru\Cerberus;

/**
 * This file is part of Cerberus,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package LucasQuinnGuru\Cerberus
 */

use LucasQuinnGuru\Cerberus\Contracts\CerberusRoleInterface;
use LucasQuinnGuru\Cerberus\Traits\CerberusRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class CerberusRole extends Model implements CerberusRoleInterface
{
    use CerberusRoleTrait;

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
        $this->table = Config::get('cerberus.roles_table');
    }
}
